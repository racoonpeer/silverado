<?php

/**
 * Cache classes file.
 *
 * Created on 12.12.2016, 13:02:36
 * @author Andreas, WebLife, http://weblife.ua/
 * @copyright 2014
 */

/**
 * CCache is the base class for cache classes with different cache storage implementation.
 *
 * A data item can be stored in cache by calling {@link set} and be retrieved back
 * later by {@link get}. In both operations, a key identifying the data item is required.
 * An expiration time and/or a dependency can also be specified when calling {@link set}.
 * If the data item expires or the dependency changes, calling {@link get} will not
 * return back the data item.
 *
 * Note, by definition, cache does not ensure the existence of a value
 * even if it does not expire. CCache is not meant to be a persistent storage.
 *
 * CCache implements the interface {@link ICache} with the following methods:
 * <ul>
 * <li>{@link get} : retrieve the value with a key (if any) from cache</li>
 * <li>{@link set} : store the value with a key into cache</li>
 * <li>{@link add} : store the value only if cache does not have this key</li>
 * <li>{@link delete} : delete the value with the specified key from cache</li>
 * <li>{@link flush} : delete all values from cache</li>
 * </ul>
 *
 * Child classes must implement the following methods:
 * <ul>
 * <li>{@link getValue}</li>
 * <li>{@link setValue}</li>
 * <li>{@link addValue}</li>
 * <li>{@link deleteValue}</li>
 * <li>{@link getValues} (optional)</li>
 * <li>{@link flushValues} (optional)</li>
 * <li>{@link serializer} (optional)</li>
 * </ul>
 *
 * CCache also can be used like an array.
 */
abstract class CCache {
    private $_id;

    /**
     * @var string a string prefixed to every cache key so that it is unique. Defaults to null which means
     * to use the generated id. If different applications need to access the same
     * pool of cached data, the same prefix should be set for each of the applications explicitly.
     */
    public $keyPrefix;

    /**
     * @var boolean whether to md5-hash the cache key for normalization purposes. Defaults to true. Setting this property to false makes sure the cache
     * key will not be tampered when calling the relevant methods {@link get()}, {@link set()}, {@link add()} and {@link delete()}. This is useful if a
     * application as well as an external application need to access the same cache pool (also see description of {@link keyPrefix} regarding this use case).
     * However, without normalization you should make sure the affected cache backend does support the structure (charset, length, etc.) of all the provided
     * cache keys, otherwise there might be unexpected behavior.
     * @since 1.1.11
     * */
    public $hashKey = true;

    /**
     * @var array|boolean the functions used to serialize and unserialize cached data. Defaults to null, meaning
     * using the default PHP `serialize()` and `unserialize()` functions. If you want to use some more efficient
     * serializer (e.g. {@link http://pecl.php.net/package/igbinary igbinary}), you may configure this property with
     * a two-element array. The first element specifies the serialization function, and the second the deserialization
     * function. If this property is set false, data will be directly sent to and retrieved from the underlying
     * cache component without any serialization or deserialization. You should not turn off serialization if
     * you are using {@link CCacheDependency cache dependency}, because it relies on data serialization.
     */
    public $serializer;

    /**
     * Initializes the application component.
     * This method setting default cache key prefix.
     * @param string $keyPrefix - string prefixed to every cache key so that it is unique.
     */
    public function __construct($keyPrefix=null) {
        if ($keyPrefix !== null)
            $this->keyPrefix = $keyPrefix;
        if ($this->keyPrefix === null)
            $this->keyPrefix = $this->getId();
    }

    /**
     * Returns the unique identifier for the application.
     * @return string the unique identifier for the application.
     */
    public function getId() {
        if ($this->_id !== null)
            return $this->_id;
        else
            return $this->_id = sprintf('%x', crc32(realpath(__FILE__)));
    }

    /**
     * @param string $key a key identifying a value to be cached
     * @return string a key generated from the provided key which ensures the uniqueness across applications
     */
    protected function generateUniqueKey($key) {
        return $this->hashKey ? md5($this->keyPrefix . $key) : $this->keyPrefix . $key;
    }

    /**
     * Retrieves a value from cache with a specified key.
     * @param string $id a key identifying the cached value
     * @return mixed the value stored in cache, false if the value is not in the cache, expired or the dependency has changed.
     */
    public function get($id) {
        $value = $this->getValue($this->generateUniqueKey($id));
        if ($value === false || $this->serializer === false)
            return $value;
        if ($this->serializer === null)
            $value = unserialize($value);
        else
            $value = call_user_func($this->serializer[1], $value);
        return $value;
    }

    /**
     * Retrieves multiple values from cache with the specified keys.
     * Some caches (such as memcache, apc) allow retrieving multiple cached values at one time,
     * which may improve the performance since it reduces the communication cost.
     * In case a cache does not support this feature natively, it will be simulated by this method.
     * @param array $ids list of keys identifying the cached values
     * @return array list of cached values corresponding to the specified keys. The array
     * is returned in terms of (key,value) pairs.
     * If a value is not cached or expired, the corresponding array value will be false.
     */
    public function mget($ids) {
        $uids = array();
        foreach ($ids as $id)
            $uids[$id] = $this->generateUniqueKey($id);

        $values = $this->getValues($uids);
        $results = array();
        if ($this->serializer === false) {
            foreach ($uids as $id => $uid)
                $results[$id] = isset($values[$uid]) ? $values[$uid] : false;
        } else {
            foreach ($uids as $id => $uid) {
                $results[$id] = false;
                if (isset($values[$uid])) {
                    $value = $this->serializer === null ? unserialize($values[$uid]) : call_user_func($this->serializer[1], $values[$uid]);
                    $results[$id] = $value;
                }
            }
        }
        return $results;
    }

    /**
     * Stores a value identified by a key into cache.
     * If the cache already contains such a key, the existing value and
     * expiration time will be replaced with the new ones.
     *
     * @param string $id the key identifying the value to be cached
     * @param mixed $value the value to be cached
     * @param integer $expire the number of seconds in which the cached value will expire. 0 means never expire.
     * @return boolean true if the value is successfully stored into cache, false otherwise
     */
    public function set($id, $value, $expire = 0) {
        if ($this->serializer === null)
            $value = serialize($value);
        elseif ($this->serializer !== false)
            $value = call_user_func($this->serializer[0], $value);

        return $this->setValue($this->generateUniqueKey($id), $value, $expire);
    }

    /**
     * Stores a value identified by a key into cache if the cache does not contain this key.
     * Nothing will be done if the cache already contains the key.
     * @param string $id the key identifying the value to be cached
     * @param mixed $value the value to be cached
     * @param integer $expire the number of seconds in which the cached value will expire. 0 means never expire.
     * @return boolean true if the value is successfully stored into cache, false otherwise
     */
    public function add($id, $value, $expire = 0) {
        if ($this->serializer === null)
            $value = serialize(array($value, $dependency));
        elseif ($this->serializer !== false)
            $value = call_user_func($this->serializer[0], $value);

        return $this->addValue($this->generateUniqueKey($id), $value, $expire);
    }

    /**
     * Deletes a value with the specified key from cache
     * @param string $id the key of the value to be deleted
     * @return boolean if no error happens during deletion
     */
    public function delete($id) {
        return $this->deleteValue($this->generateUniqueKey($id));
    }

    /**
     * Deletes all values from cache.
     * Be careful of performing this operation if the cache is shared by multiple applications.
     * @return boolean whether the flush operation was successful.
     */
    public function flush() {
        return $this->flushValues();
    }

    /**
     * Retrieves a value from cache with a specified key.
     * This method should be implemented by child classes to retrieve the data
     * from specific cache storage. The uniqueness and dependency are handled
     * in {@link get()} already. So only the implementation of data retrieval
     * is needed.
     * @param string $key a unique key identifying the cached value
     * @return string the value stored in cache, false if the value is not in the cache or expired.
     * @throws CCacheException if this method is not overridden by child classes
     */
    protected function getValue($key) {
        throw new CCacheException(get_class($this) . ' does not support get() functionality.');
    }

    /**
     * Retrieves multiple values from cache with the specified keys.
     * The default implementation simply calls {@link getValue} multiple
     * times to retrieve the cached values one by one.
     * If the underlying cache storage supports multiget, this method should
     * be overridden to exploit that feature.
     * @param array $keys a list of keys identifying the cached values
     * @return array a list of cached values indexed by the keys
     */
    protected function getValues($keys) {
        $results = array();
        foreach ($keys as $key)
            $results[$key] = $this->getValue($key);
        return $results;
    }

    /**
     * Stores a value identified by a key in cache.
     * This method should be implemented by child classes to store the data
     * in specific cache storage. The uniqueness and dependency are handled
     * in {@link set()} already. So only the implementation of data storage
     * is needed.
     *
     * @param string $key the key identifying the value to be cached
     * @param string $value the value to be cached
     * @param integer $expire the number of seconds in which the cached value will expire. 0 means never expire.
     * @return boolean true if the value is successfully stored into cache, false otherwise
     * @throws CCacheException if this method is not overridden by child classes
     */
    protected function setValue($key, $value, $expire) {
        throw new CCacheException(get_class($this) . ' does not support set() functionality.');
    }

    /**
     * Stores a value identified by a key into cache if the cache does not contain this key.
     * This method should be implemented by child classes to store the data
     * in specific cache storage. The uniqueness and dependency are handled
     * in {@link add()} already. So only the implementation of data storage
     * is needed.
     *
     * @param string $key the key identifying the value to be cached
     * @param string $value the value to be cached
     * @param integer $expire the number of seconds in which the cached value will expire. 0 means never expire.
     * @return boolean true if the value is successfully stored into cache, false otherwise
     * @throws CCacheException if this method is not overridden by child classes
     */
    protected function addValue($key, $value, $expire) {
        throw new CCacheException(get_class($this) . ' does not support add() functionality.');
    }

    /**
     * Deletes a value with the specified key from cache
     * This method should be implemented by child classes to delete the data from actual cache storage.
     * @param string $key the key of the value to be deleted
     * @return boolean if no error happens during deletion
     * @throws CCacheException if this method is not overridden by child classes
     */
    protected function deleteValue($key) {
        throw new CCacheException(get_class($this) . ' does not support delete() functionality.');
    }

    /**
     * Deletes all values from cache.
     * Child classes may implement this method to realize the flush operation.
     * @return boolean whether the flush operation was successful.
     * @throws CCacheException if this method is not overridden by child classes
     * @since 1.1.5
     */
    protected function flushValues() {
        throw new CCacheException(get_class($this) . ' does not support flushValues() functionality.');
    }

    /**
     * Returns whether there is a cache entry with a specified key.
     * This method is required by the interface ArrayAccess.
     * @param string $id a key identifying the cached value
     * @return boolean
     */
    public function offsetExists($id) {
        return $this->get($id) !== false;
    }

    /**
     * Retrieves the value from cache with a specified key.
     * This method is required by the interface ArrayAccess.
     * @param string $id a key identifying the cached value
     * @return mixed the value stored in cache, false if the value is not in the cache or expired.
     */
    public function offsetGet($id) {
        return $this->get($id);
    }

    /**
     * Stores the value identified by a key into cache.
     * If the cache already contains such a key, the existing value will be
     * replaced with the new ones. To add expiration and dependencies, use the set() method.
     * This method is required by the interface ArrayAccess.
     * @param string $id the key identifying the value to be cached
     * @param mixed $value the value to be cached
     */
    public function offsetSet($id, $value) {
        $this->set($id, $value);
    }

    /**
     * Deletes the value with the specified key from cache
     * This method is required by the interface ArrayAccess.
     * @param string $id the key of the value to be deleted
     * @return boolean if no error happens during deletion
     */
    public function offsetUnset($id) {
        $this->delete($id);
    }

}

/**
 * CMemCache implements a cache application component based on {@link http://memcached.org/ memcached}.
 *
 * CMemCache can be configured with a list of memcache servers by settings
 * its {@link setServers servers} property. By default, CMemCache assumes
 * there is a memcache server running on localhost at port 11211.
 *
 * See {@link CCache} manual for common cache operations that are supported by CMemCache.
 *
 * Note, there is no security measure to protected data in memcache.
 * All data in memcache can be accessed by any process running in the system.
 *
 * To use CMemCache as the cache application component, configure the application as follows,
 * <pre>
 * array(
 *       array(
 *          'host'=>'server1',
 *          'port'=>11211,
 *          'weight'=>60,
 *      ),
 *      array(
 *          'host'=>'server2',
 *          'port'=>11211,
 *          'weight'=>40,
 *      ),
 * )
 * </pre>
 * In the above, two memcache servers are used: server1 and server2.
 * You can configure more properties of every server, including:
 * host, port, persistent, weight, timeout, retryInterval, status.
 * See {@link http://www.php.net/manual/en/function.memcache-addserver.php}
 * for more details.
 *
 * CMemCache can also be used with {@link http://pecl.php.net/package/memcached memcached}.
 * To do so, set {@link useMemcached} to be true.
 *
 * @property mixed $memCache The memcache instance (or memcached if {@link useMemcached} is true) used by this component.
 * @property array $servers List of memcache server configurations. Each element is a {@link CMemCacheServerConfiguration}.
 */
class CMemCache extends CCache {

    /**
     * @var boolean whether to use memcached or memcache as the underlying caching extension.
     * If true {@link http://pecl.php.net/package/memcached memcached} will be used.
     * If false {@link http://pecl.php.net/package/memcache memcache}. will be used.
     * Defaults to false.
     */
    public $useMemcached = false;

    /**
     * @var Memcache the Memcache instance
     */
    private $_cache = null;

    /**
     * @var array list of memcache server configurations
     */
    private $_servers = array();

    /**
     * Initializes this application component.
     * This method is required by the {@link IApplicationComponent} interface.
     * It creates the memcache instance and adds memcache servers.
     * @param string $keyPrefix - string prefixed to every cache key so that it is unique.
     * @throws CCacheException if memcache extension is not loaded
     */
    public function __construct($keyPrefix=null) {
        parent::__construct($keyPrefix);
        $this->useMemcached = getenv("IS_MAC");
        $servers = $this->getServers();
        $cache = $this->getMemCache();
        if (count($servers)) {
            foreach ($servers as $server) {
                if ($this->useMemcached)
                    $cache->addServer($server->host, $server->port, $server->weight);
                else
                    $cache->addServer($server->host, $server->port, $server->persistent, $server->weight, $server->timeout, $server->retryInterval, $server->status);
            }
        } else
            $cache->addServer('localhost', 11211);
    }

    /**
     * @throws CCacheException if extension isn't loaded
     * @return Memcache|Memcached the memcache instance (or memcached if {@link useMemcached} is true) used by this component.
     */
    public function getMemCache() {
        if ($this->_cache !== null)
            return $this->_cache;
        else {
            $extension = $this->useMemcached ? 'memcached' : 'memcache';
            if (!extension_loaded($extension))
                throw new CCacheException("CMemCache requires PHP {$extension} extension to be loaded.");
            return $this->_cache = $this->useMemcached ? new Memcached : new Memcache;
        }
    }

    /**
     * @return array list of memcache server configurations. Each element is a {@link CMemCacheServerConfiguration}.
     */
    public function getServers() {
        return $this->_servers;
    }

    /**
     * @return array list of memcache server configurations. Each element is a {@link CMemCacheServerConfiguration}.
     */
    public function getStats() {
        return $this->_cache->getStats();
    }

    /**
     * @param array $servers list of memcache server configurations. Each element must be an array
     * with the following keys: host, port, persistent, weight, timeout, retryInterval, status.
     * @see http://www.php.net/manual/en/function.Memcache-addServer.php
     */
    public function setServers($servers) {
        foreach ($servers as $c)
            $this->_servers[] = new CMemCacheServerConfiguration($c);
    }

    /**
     * Retrieves a value from cache with a specified key.
     * This is the implementation of the method declared in the parent class.
     * @param string $key a unique key identifying the cached value
     * @return string the value stored in cache, false if the value is not in the cache or expired.
     */
    protected function getValue($key) {
        return $this->_cache->get($key);
    }

    /**
     * Retrieves multiple values from cache with the specified keys.
     * @param array $keys a list of keys identifying the cached values
     * @return array a list of cached values indexed by the keys
     */
    protected function getValues($keys) {
        return $this->useMemcached ? $this->_cache->getMulti($keys) : $this->_cache->get($keys);
    }

    /**
     * Stores a value identified by a key in cache.
     * This is the implementation of the method declared in the parent class.
     *
     * @param string $key the key identifying the value to be cached
     * @param string $value the value to be cached
     * @param integer $expire the number of seconds in which the cached value will expire. 0 means never expire.
     * @return boolean true if the value is successfully stored into cache, false otherwise
     */
    protected function setValue($key, $value, $expire) {
        if ($expire > 0)
            $expire+=time();
        else
            $expire = 0;

        return $this->useMemcached ? $this->_cache->set($key, $value, $expire) : $this->_cache->set($key, $value, 0, $expire);
    }

    /**
     * Stores a value identified by a key into cache if the cache does not contain this key.
     * This is the implementation of the method declared in the parent class.
     *
     * @param string $key the key identifying the value to be cached
     * @param string $value the value to be cached
     * @param integer $expire the number of seconds in which the cached value will expire. 0 means never expire.
     * @return boolean true if the value is successfully stored into cache, false otherwise
     */
    protected function addValue($key, $value, $expire) {
        if ($expire > 0)
            $expire+=time();
        else
            $expire = 0;

        return $this->useMemcached ? $this->_cache->add($key, $value, $expire) : $this->_cache->add($key, $value, 0, $expire);
    }

    /**
     * Deletes a value with the specified key from cache
     * This is the implementation of the method declared in the parent class.
     * @param string $key the key of the value to be deleted
     * @return boolean if no error happens during deletion
     */
    protected function deleteValue($key) {
        return $this->_cache->delete($key, 0);
    }

    /**
     * Deletes all values from cache.
     * This is the implementation of the method declared in the parent class.
     * @return boolean whether the flush operation was successful.
     * @since 1.1.5
     */
    protected function flushValues() {
        return $this->_cache->flush();
    }

}

/**
 * CMemCacheServerConfiguration represents the configuration data for a single memcache server.
 *
 * See {@link http://www.php.net/manual/en/function.Memcache-addServer.php}
 * for detailed explanation of each configuration property.
 */
class CMemCacheServerConfiguration {

    /**
     * @var string memcache server hostname or IP address
     */
    public $host;

    /**
     * @var integer memcache server port
     */
    public $port = 11211;

    /**
     * @var boolean whether to use a persistent connection
     */
    public $persistent = true;

    /**
     * @var integer probability of using this server among all servers.
     */
    public $weight = 1;

    /**
     * @var integer value in seconds which will be used for connecting to the server
     */
    public $timeout = 15;

    /**
     * @var integer how often a failed server will be retried (in seconds)
     */
    public $retryInterval = 15;

    /**
     * @var boolean if the server should be flagged as online upon a failure
     */
    public $status = true;

    /**
     * Constructor.
     * @param array $config list of memcache server configurations.
     * @throws CCacheException if the configuration is not an array
     */
    public function __construct($config) {
        if (is_array($config)) {
            foreach ($config as $key => $value) {
                if (isset($this->$key)) {
                    $this->$key = $value;
                }
            }
            if ($this->host === null)
                throw new CCacheException('CMemCache server configuration must have "host" value.');
        } else
            throw new CCacheException('CMemCache server configuration must be an array.');
    }

}

/**
 * CCacheException class.
 * CCacheException represents a generic exception for all purposes.
 */
class CCacheException extends Exception {

}
