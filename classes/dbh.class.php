<?php

class Dbh {

    private $server = 'localhost';
    private $username = 'root';
    private $password = '';
    private $name = 'giaware';
    private $charset = 'utf8mb4';

    protected function connect() {
        $dsn = 'mysql:host=' . $this->server . ';dbname=' . $this->name . ';charset=' . $this->charset;
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
    

}