<?php

class ConnectDb {
    // Hold the class instance.
    private static $instance = null;
    private $conn;

    private $database = 'database/sample.db';

    private function __construct()
    {
        $this->conn = new SQLite3($this->database, SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new ConnectDb();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}