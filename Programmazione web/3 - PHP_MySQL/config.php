<?php

/*

CREATE TABLE todos (
id INTEGER AUTO_INCREMENT PRIMARY KEY,
title TEXT NOT NULL,
description TEXT,
status TEXT NOT NULL,
priority TEXT NOT NULL,
CHECK (status in ("todo", "inprogress", "done")),
CHECK (priority in ("low", "high", "medium"))
);

*/

$dbConfig = [
    "hostname" => "127.0.0.1",
    "dbname" => "mytodo",
    "user" => "username",
    "password" => "password"
];

?>