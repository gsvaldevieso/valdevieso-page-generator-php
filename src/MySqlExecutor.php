<?php
namespace Valdevieso\PageGenerator\Executors;

require_once("interfaces/IDataBaseAgent.php");
require_once("Config.php");

use Valdevieso\PageGenerator\Interfaces\IDataBaseAgent;
use Valdevieso\PageGenerator\Config;

class MySqlExecutor implements IDataBaseAgent{
    private $_config;
    private $_connection;

    public function __construct(){
        $this->_config = new Config();
        $this->_connection = new \PDO($this->_config->getConnectionString(), $this->_config->getUser(), $this->_config->getPassword());
    }

    public function executeQuery($query){
        try{
            $result = $this->_connection->query($query);
            return $result;
        }catch(PDOException  $e ){
            echo "Error: ".$e;
        }
    }

    public function getTableDefinition($tableName){
        $tableQueryResult = $this->executeQuery('DESCRIBE '.$tableName);
        return $tableQueryResult->fetchAll();
    }
}