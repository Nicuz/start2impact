<?php
require $_SERVER['DOCUMENT_ROOT']."/config.php";
require $_SERVER['DOCUMENT_ROOT']."/database/Database.php";
$database = new Database($dbConfig);
    
$database->deleteTask($_REQUEST["id"]);
header('Location: /');
