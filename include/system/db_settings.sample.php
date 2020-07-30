<?php

return getenv('IS_DEV') ? array(
    "dbhost"     => "localhost",
    "dbusername" => "root",
    "dbpassword" => "2c4uk915",
    "dbname"     => "silverado"
) : array(
    "dbhost"     => "silverad.mysql.tools",
    "dbusername" => "silverad_db",
    "dbpassword" => "rh4BbwGr",
    "dbname"     => "silverad_db"
);