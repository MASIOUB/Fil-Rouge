<?php

class Model
{
    
    protected PDO $connection;
    protected $tableName;
    protected $joinTable;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=enjoy", "root", "");
    }

    public function fetchAll($filtre = "", $data = [])
    {

        $statment = $this->connection->prepare("SELECT * FROM $this->tableName $filtre");
        $statment->execute($data);
        return $statment->fetchAll(PDO::FETCH_ASSOC);
    }

    public function count($column)
    {
        $statement = $this->connection->prepare("SELECT COUNT($column) FROM $this->tableName");
        return $statement->execute();
    }

    // SELECT destination, LEFT(`description`, 10) FROM trips WHERE status = "active" ORDER BY id DESC LIMIT 0,5;

    public function getLastLeft($columns = ["*"], $leftColumn,  $filtre = "", $limit)
    {
        $cols = implode(", ", [...$columns, "LEFT($leftColumn, 40)"]);
        $statement = $this->connection->prepare("SELECT $cols AS data FROM $this->tableName $filtre ORDER BY id DESC $limit");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function sum($columns = ["*"], $sumColumn, $jointure, $filtre, $groupByColumn= null)
    {
        $cols = implode(", ", [...$columns, "SUM($sumColumn)"]);
        $group = "";
        if($groupByColumn){
          $group = "GROUP BY $groupByColumn";  
        }
        $query = "SELECT $cols as sum_seat FROM $this->tableName $jointure $this->joinTable $filtre $group";
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function join($columns = ["*"], $joiture = "", $filtre = "",$data = [])
    {
        $statement = $this->connection->prepare("SELECT DISTINCT $columns FROM $this->tableName $joiture $filtre");
        $statement->execute($data);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function oneJoin($columns = ["*"], $joiture = "", $filtre = "",$data = [])
    {
        $statement = $this->connection->prepare("SELECT DISTINCT $columns FROM $this->tableName $joiture $filtre");
        $statement->execute($data);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // public function sumPost($columns = ["*"], $sumColumn, $jointure, $filtre, $groupByColumn= null, $data = [])
    // {
    //     $cols = implode(", ", [...$columns, "SUM($sumColumn)"]);
    //     $group = "";
    //     if($groupByColumn){
    //       $group = "GROUP BY $groupByColumn";  
    //     }
    //     $query = "SELECT $cols as sum_seat FROM $this->tableName $jointure $this->joinTable $filtre $group";
    //     $statement = $this->connection->prepare($query);
    //     $statement->execute($data);

    //     return $statement->fetchAll();
    // }

    public function create($data)
    {
        $keys = array_keys($data);
        $columns = implode(",", $keys);
        $placeholders = implode(",", array_map(function ($key) {
            return ":$key";
        }, $keys));
        $statment = $this->connection->prepare("INSERT INTO $this->tableName  ($columns) VALUES ($placeholders)");
        return $statment->execute($data);
    }

    public function getLastRow($limit = "", $filtre = "")
    {
        $statement = $this->connection->prepare("SELECT * FROM $this->tableName order by id desc $limit ");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function update($data, $id)
    {
        $updatedColumns = array_map(function ($key) {
            return "$key=:$key";
        }, array_keys($data));

        $updatedColumns = implode(", ", $updatedColumns);
        
        $statement = $this->connection->prepare("UPDATE $this->tableName SET $updatedColumns WHERE id=:id");
        return $statement->execute([...$data, "id" => $id]);
    }

    public function delete($id)
    {
        $statement = $this->connection->prepare("DELETE FROM $this->tableName WHERE id=:id ");
        return $statement->execute(["id"=> $id]);
    }

    public function fetchById($id)
    {
        return $this->fetchOne("WHERE id =:id", ["id" => $id]);
    }

    public function fetchOne($filtre = "", $data = [])
    {
        $statment = $this->connection->prepare("SELECT * FROM $this->tableName $filtre");
        $statment->execute($data);
        return $statment->fetch(PDO::FETCH_ASSOC);
    }
  
}