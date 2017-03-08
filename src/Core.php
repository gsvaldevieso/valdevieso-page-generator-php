<?php
namespace Valdevieso\PageGenerator;
error_reporting(E_ALL); ini_set('display_errors', '1');

require_once("MySqlExecutor.php");
require_once("PageBuilder.php");

use Valdevieso\PageGenerator\Executors\MySqlExecutor;
use Valdevieso\PageGenerator\PageBuilder;

class Core{
    private $_executor;
    
    public function __construct(){
        $this->_executor = new MySqlExecutor();        
    }

    public function generatePage($tableName){
        $fieldDefinitions = $this->_executor->getTableDefinition('tabela_dados');
        $pageBuilder = new PageBuilder($tableName, $fieldDefinitions);
        echo $pageBuilder->getPageHtml();
    }
}

$c = new Core();
$c->generatePage('tabela_dados');
