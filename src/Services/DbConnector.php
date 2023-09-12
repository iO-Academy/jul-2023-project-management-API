<?php
namespace ProjectManager\Services;

class DbConnector {
    public static function connect(): \PDO
    {
        $db = new \PDO('mysql:dbname=project_manager;host=db', 'root', 'password');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        return $db;
    }
}

