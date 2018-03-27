<?php

class DB extends PDO {

    function __construct() {
        parent::__construct(DNS, DBUSERNAME, DBPASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    }

}