<?php

require $_SERVER['DOCUMENT_ROOT']."/models/Task.php";

class Database
{
    private $username;
    private $dbname;
    private $user;
    private $password;
    private $pdo;

    public function __construct($dbConfig)
    {
        $this->hostname = $dbConfig["hostname"];
        $this->dbname = $dbConfig["dbname"];
        $this->user = $dbConfig["user"];
        $this->password = $dbConfig["password"];
        try {
            $this->pdo = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getTasks($status)
    {
        $statement = $this->pdo->prepare("SELECT * FROM todos WHERE status=\"$status\"");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, "Task");
    }

    public function addTask($title, $description, $status, $priority)
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO todos (title, description, status, priority) VALUES (?, ?, ?, ?)"
        );
        $statement->execute([$title, $description, $status, $priority]);
    }

    public function updateTask($id, $title, $description, $status, $priority)
    {
        $statement = $this->pdo->prepare(
            "UPDATE todos SET title = ?, description = ?, status = ? , priority = ? WHERE ID=?"
        );
        $statement->execute([$title, $description, $status, $priority, $id]);
    }

    public function deleteTask($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM todos WHERE ID=?");
        $statement->execute([$id]);
    }
}
