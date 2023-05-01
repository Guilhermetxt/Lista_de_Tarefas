<?php

function traduz_prioridade($codigo)
{
    $prioridade = '';

    switch ($codigo) {
        case 1:
            $prioridade = 'Baixa';
            break;
        case 2:
            $prioridade = 'Media';
            break;
        case 3:
            $prioridade = 'Alta';
            break;
    }

    return $prioridade;
}

function traduz_data_para_banco($data)
{
    if ($data == '') {
        return null;
    }

    $dados = explode("/", $data);
    $data_banco = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

    return $data_banco;
}

function mostra_data($data)
{
    if ($data == null) {
        return '';
    }

    $dados = explode("-", $data);
    $data_final = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
    return $data_final;
}

function tarefa_concluida($tarefa)
{
    if($tarefa == 1) {
        return 'Sim';
    }

    return 'Não';
}
