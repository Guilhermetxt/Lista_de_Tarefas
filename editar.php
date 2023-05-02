<?php

require_once('dao/TarefasDaoMysql.php');
require_once('banco.php');


$tarefaDao = new TarefasDaoMysql($pdo);
$tarefa = false;

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $tarefa = $tarefaDao->findById($id);
}

if ($tarefa === false) {
    header('Location: template.php');
    exit;
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>Gerenciador de Tarefas</h1>
        <form action="editar_action.php" method="POST">
            <fieldset>
                <legend>Editar Tarefa</legend>
                <input type="hidden" name="id" value="<?=$tarefa->getId();?>">
                <label>
                    <input class="form-cor" type="text" name="nome" placeholder="Tarefa" autocomplete="off" value="<?=$tarefa->getNome();?>">
                </label>
                <label>
                    <textarea class="form-cor" name="descricao" placeholder="Descrição (Opcional):"><?=$tarefa->getDescricao()?></textarea>
                </label>
                <label>
                    <input class="form-cor" type="text" name="prazo" placeholder="Prazo (Opcional):" autocomplete="off" value="<?=$tarefa->getPrazo();?>">
                </label>
                <fieldset class="prioridade">
                    <legend>Prioridade</legend>
                    <label for="baixa">
                        <input type="radio" name="prioridade" id="baixa" value="1" <?php echo ($tarefa->getPrioridade() == '1') ? 'checked' : ''?>>
                        Baixa
                    </label>
                    <label for="media">
                        <input type="radio" name="prioridade" id="media" value="2" <?php echo ($tarefa->getPrioridade() == '2') ? 'checked' : ''?>>
                            Média
                    </label>
                    <label for="alta">
                        <input type="radio" name="prioridade" id="alta" value="3" <?php echo ($tarefa->getPrioridade() == '3') ? 'checked' : ''?>>
                            Alta
                    </label>   
                </fieldset>
                <label>
                    Tarefa Concluída:
                    <input type="checkbox" name="concluida" value="1" <?php echo ($tarefa->getConcluido() == '1') ? 'checked' : ''?>>
                </label>
                <input type="submit" value="Salvar">
            </fieldset>
        </form>
    </div>
</body>
</html>