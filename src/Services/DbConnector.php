<?php
namespace ProjectManager\Services;

class DbConnector {
    private static string $dsn = 'mysql:dbname=project_manager;host=db';
    private static string $username = 'root';
    private static string $password = 'password';

    public static function connect(): \PDO
    {
        $db = new \PDO(self::$dsn, self::$username, self::$password);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        return $db;
    }
}

