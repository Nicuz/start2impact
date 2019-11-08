<?php

require "config.php";
require "database/Database.php";

$database = new Database($dbConfig);
$todoTasks = $database->getTasks("todo");
$doingTasks = $database->getTasks("inprogress");
$doneTasks = $database->getTasks("done");
