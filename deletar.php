<?php

require_once('dao/TarefasDaoMysql.php');
require_once('banco.php');

$id = filter_input(INPUT_GET, 'id');

$tarefaDao = new TarefasDaoMysql($pdo);

if ($id) {
    $tarefaDao->delete($id);
}

header('Location: template.php');
exit;
