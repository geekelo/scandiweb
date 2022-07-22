<?php
class Dbh {

    private $host ="localhost";
    private $user ="root";
    private $pwd ="";
    private $dbName ="cart_db";


    protected function connect(){

        $host ="localhost";
                 $user ="root";
                $pwd ="";
                $dbName = "cart_db";


        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;
        $pdo = new PDO($dsn, $this-> user, $this->pwd);

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}