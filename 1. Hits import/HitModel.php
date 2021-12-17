<?php


class HitModel
{

    private $connection;

    private $config = [
        'host'=>'localhost',
        'username'=>'root',
        'password'=>'',
        'database'=>'',
    ];

    public function __construct()
    {

        // Create connection
        if (!$this->connection) {
            $this->connection = new mysqli(
                $this->config['host'],
                $this->config['username'],
               $this->config['password'],
               $this->config['database']
            );
        }

        $this->createTable();
    }

    //create database to store data
    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS hits (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                job_id INT(6) NOT NULL,
                job_title VARCHAR(255) NOT NULL,
                date_time TIMESTAMP,
                tuple_key VARCHAR(255)
            )";

        return $this->connection->query($sql);
    }

    public function alreadyExists($field,$value)
    {

        $sql = "select id from hits where $field ='".$value."'";

        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) return true;

        return false;

    }

    public function insertIntoTable($query,$multiple=false)
    {
        //insert multiple records
        if ($multiple){

            return $this->connection->multi_query($query);
        }
        return $this->connection->query($query);

    }

    public function queryRecords()
    {

    }

}