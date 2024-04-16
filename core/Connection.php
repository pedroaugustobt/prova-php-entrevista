<?php

class Connection {
    private $databaseFile;
    private $connection;

    public function __construct() {
        $this->databaseFile = realpath(__DIR__ . "/db.sqlite");
        $this->connect();
    }

    private function connect() {
        $this->connection = new PDO("sqlite:{$this->databaseFile}");
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $this->connection;
    }

    public function getConnection() {
        return $this->connection ?: $this->connection = $this->connect();
    }
}

?>