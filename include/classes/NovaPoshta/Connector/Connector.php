<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace NovaPoshta\Connector;
/**
 * Description of Connector
 *
 * @author oleksandr
 */
class Connector {
    /**
     *
     * @var string 
     */
    protected $url = false;
    /**
     *
     * @var type 
     */
    protected $key = false;
    /**
     *
     * @var type 
     */
    protected $ch  = null;
    
    public function __construct($url, $key) {
        $this->url = $url;
        $this->key = $key;
    }
    
    public function init(ConnectorCH $ch){
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_URL, $ch->CURLOPT_URL);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, $ch->CURLOPT_RETURNTRANSFER);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, $ch->CURLOPT_RETURNTRANSFER);
    }

    public function exec() {
        return curl_exec($this->ch);
    }
    
    public function __destruct() {
        curl_close($this->ch);
    }
}

class ConnectorCH {
    /**
     *
     * @var type 
     */
    protected $CURLOPT_URL;
    /**
     *
     * @var type 
     */
    protected $CURLOPT_RETURNTRANSFER;
    /**
     *
     * @var type 
     */
    protected $CURLOPT_HTTPHEADER;
    /**
     *
     * @var type 
     */
    protected $CURLOPT_HEADER;
    /**
     *
     * @var type 
     */
    protected $CURLOPT_POST;
    /**
     *
     * @var type 
     */
    protected $CURLOPT_POSTFIELDS;
    /**
     *
     * @var type 
     */
    protected $CURLOPT_SSL_VERIFYPEER;
    /**
     * 
     * @param ConnectorCHBuilder $builder
     */
    public function __construct(ConnectorCHBuilder $builder) {
        $this->CURLOPT_URL = $builder->CURLOPT_URL;
        $this->CURLOPT_RETURNTRANSFER = $builder->CURLOPT_RETURNTRANSFER;
        $this->CURLOPT_HTTPHEADER = $builder->CURLOPT_HTTPHEADER;
        $this->CURLOPT_HEADER = $builder->CURLOPT_HEADER;
        $this->CURLOPT_POST = $builder->CURLOPT_POST;
        $this->CURLOPT_POSTFIELDS = $builder->CURLOPT_POSTFIELDS;
        $this->CURLOPT_SSL_VERIFYPEER = $builder->CURLOPT_SSL_VERIFYPEER;
    }
}

class ConnectorCHBuilder {
    /**
     *
     * @var type 
     */
    public $CURLOPT_URL;
    /**
     *
     * @var type 
     */
    public $CURLOPT_RETURNTRANSFER;
    /**
     *
     * @var type 
     */
    public $CURLOPT_HTTPHEADER;
    /**
     *
     * @var type 
     */
    public $CURLOPT_HEADER;
    /**
     *
     * @var type 
     */
    public $CURLOPT_POST;
    /**
     *
     * @var type 
     */
    public $CURLOPT_POSTFIELDS;
    /**
     *
     * @var type 
     */
    public $CURLOPT_SSL_VERIFYPEER;
    /**
     * 
     * @param string $url
     */
    public function setUrl($url) {
        $this->CURLOPT_URL = $url;
        return $this;
    }
    /**
     * 
     * @param int $returnTransfer
     */
    public function setReturnTransfer($returnTransfer) {
        $this->CURLOPT_RETURNTRANSFER = $returnTransfer;
        return $this;
    }
    /**
     * 
     * @param string $header
     */
    public function setHeader($header) {
        $this->CURLOPT_HEADER = $header;
        return $this;
    }
    /**
     * 
     * @param int $post
     */
    public function setPost($post) {
        $this->CURLOPT_POST = $post;
        return $this;
    }
    /**
     * 
     * @param array $postFields
     */
    public function setPostFields($postFields) {
        $this->CURLOPT_POSTFIELDS = $postFields;
        return $this;
    }
    /**
     * 
     * @param int $ssl
     */
    public function setSSL($ssl) {
        $this->CURLOPT_SSL_VERIFYPEER = $ssl;
        return $this;
    }
    
    public function build() {
        return new ConnectorCH($this);
    }
}