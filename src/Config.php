<?php
namespace Valdevieso\PageGenerator;

require_once("interfaces/IDataBaseAgent.php");

class Config{
    private $_host = "localhost";
    private $_user = "root";
    private $_pass = "123";
    private $_database = "db";
    private $_driver = "mysql";

    public function getConnectionString(){
        return $this->_driver.':host='.$this->_host.';dbname='.$this->_database;
    }

    public function getUser(){
        return $this->_user;
    }

    public function getPassword(){
        return $this->_pass;
    }
}