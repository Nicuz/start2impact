<?php

if (isset($_POST)) {
    require $_SERVER["DOCUMENT_ROOT"]."/config.php";
    require $_SERVER["DOCUMENT_ROOT"]."/database/Database.php";
    $database = new Database($dbConfig);

    $title = trim($_POST["taskTitle"]);
    $description = strlen(trim($_POST["taskDescription"])) > 0 ? trim($_POST["taskDescription"]) : null;
    $status = strtolower(str_replace(" ", "", $_POST["taskStatus"]));
    $priority = $_POST["taskPriority"];

    $database->addTask($title, $description, $status, $priority);
    header("Location: /");
}
