<?php

require_once('models/Tarefas.php');
require_once('dao/TarefasDaoMysql.php');
require_once('banco.php');
require_once('ajustes.php');


$tarefaDao = new TarefasDaoMysql($pdo);

$nomeTarefa = filter_input(INPUT_POST, 'nome');
$descricao = filter_input(INPUT_POST, 'descricao');
$prazo = filter_input(INPUT_POST, 'prazo');
$prioridade = filter_input(INPUT_POST, 'prioridade');
$concluida = filter_input(INPUT_POST, 'concluida');


if ($nomeTarefa != '') {
    $t = new Tarefas();
    $t->setNome($nomeTarefa);
    $t->setDescricao($descricao);
    $t->setPrazo(traduz_data_para_banco($prazo));
    $t->setPrioridade($prioridade);
    $t->setConcluido($concluida);

    $tarefaDao->add($t);

    header('Location: template.php');
    exit(); 
} else {
    header('Location: template.php');
    exit();
}