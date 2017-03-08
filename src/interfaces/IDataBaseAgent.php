<?php
namespace Valdevieso\PageGenerator\Interfaces;

interface IDataBaseAgent{
    public function executeQuery($query);
    public function getTableDefinition($tableName);
}