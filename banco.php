<?php


$db_nome = "tarefas";
$db_host = "localhost";
$db_user = "root";
$db_pass = "#Awsp3854"; // senha bd

$pdo = new PDO("mysql:dbname=".$db_nome.";host=".$db_host, $db_user, $db_pass);
