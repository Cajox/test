<?php
namespace App\Models;

class Model{

    protected static $db;

    public function __construct()
    {
        if(!isset(self::$db)) {
            $config = include(__DIR__ . "/../../config/db.php");
            $pdo = new \PDO("mysql:host=".$config['host'].";dbname=".$config['db_name'], $config['db_user'], $config['db_pass']);
            self::$db = new \Envms\FluentPDO\Query($pdo);
        }
        return self::$db;
    }
}