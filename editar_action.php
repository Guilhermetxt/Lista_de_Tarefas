<?php

require_once('dao/TarefasDaoMysql.php');
require_once('banco.php');


$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$descricao = filter_input(INPUT_POST, 'descricao');
$prazo = filter_input(INPUT_POST, 'prazo');
$prioridade = filter_input(INPUT_POST, 'prioridade');
$concluida = filter_input(INPUT_POST, 'concluida');

$tarefaDao = new TarefasDaoMysql($pdo);


if ($id && $nome) {

    $t = new Tarefas();
    $t->setId($id);
    $t->setNome($nome);
    $t->setDescricao($descricao);
    $t->setPrazo($prazo);
    $t->setPrioridade($prioridade);
    $t->setConcluido($concluida);

    $tarefaDao->edit($t);

    header('Location: template.php');
    exit;
} else {
    header('Location: editar.php');
    exit;
}