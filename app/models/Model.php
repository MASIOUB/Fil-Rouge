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

    public function sumPost($columns = ["*"], $sumColumn, $jointure, $filtre, $groupByColumn= null, $data = [])
    {
        $cols = implode(", ", [...$columns, "SUM($sumColumn)"]);
        $group = "";
        if($groupByColumn){
          $group = "GROUP BY $groupByColumn";  
        }
        $query = "SELECT $cols as sum_seat FROM $this->tableName $jointure $this->joinTable $filtre $group";
        $statement = $this->connection->prepare($query);
        $statement->execute($data);

        return $statement->fetchAll();
    }

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

    public function getLastId()
    {
        $statement = $this->connection->prepare("SELECT id FROM $this->tableName order by id desc LIMIT 0,1 ");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

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