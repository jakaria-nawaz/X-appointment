<?php

class Database
{

    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "appointmentdb";

    protected $db_connection;

    public function __construct()
    {
        try {
            $this->db_connection = new PDO("mysql:host={$this->db_host};dbname={$this->db_name}", $this->db_user, $this->db_pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function selectQuery($sql, $data)
    {
        try {
            $stmt = $this->db_connection->prepare($sql);
            $stmt->execute($data);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function selectQuerySingleFetch($sql, $data)
    {
        try {
            $stmt = $this->db_connection->prepare($sql);
            $stmt->execute($data);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function insertQuery($sql, $data)
    {
        try {
            $stmt = $this->db_connection->prepare($sql);
            return $stmt->execute($data);;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function updateQuery($sql, $data)
    {
        $stmt = $this->db_connection->prepare($sql);
        return $stmt->execute($data);
    }


    public function deleteQuery($sql, $data)
    {
        $stmt = $this->db_connection->prepare($sql);
        return $stmt->execute($data);
    }

} //class ends