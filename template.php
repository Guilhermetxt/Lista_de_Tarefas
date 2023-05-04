<?php

require_once('banco.php');
require_once('dao/TarefasDaoMysql.php');
require_once('ajustes.php');

$tarefasDao = new TarefasDaoMysql($pdo);
$listaTarefas = $tarefasDao->findByAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>Gerenciador de Tarefas</h1>
            <form action="adicionar.php" method="POST">
                <fieldset>
                    <legend>Nova Tarefa</legend>
                    <label>
                        <input class="form-cor" type="text" name="nome" placeholder="Tarefa" autocomplete="off" required>
                    </label>
                    <label>
                        <textarea class="form-cor" name="descricao" placeholder="Descrição (Opcional):"></textarea>
                    </label>
                    <label>
                        <input class="form-cor" type="text" name="prazo" placeholder="Prazo (Opcional):" autocomplete="off">
                    </label>
                    <fieldset class="prioridade">
                        <legend>Prioridade</legend>
                        <label for="baixa">
                            <input type="radio" name="prioridade" id="baixa" value="1" checked>
                            Baixa
                        </label>
                        <label for="media">
                            <input type="radio" name="prioridade" id="media" value="2">
                                Média
                        </label>
                        <label for="alta">
                            <input type="radio" name="prioridade" id="alta" value="3">
                                Alta
                        </label>   
                    </fieldset>
                    <label>
                        Tarefa Concluída:
                        <input type="checkbox" name="concluida" value="1">
                    </label>
                    <input type="submit" value="Cadastrar">
                </fieldset>
            </form>

        <table>
            <tr>
                <th>Tarefas</th>
                <th>Descrição</th>
                <th>Prazo</th>
                <th>Prioridade</th>
                <th>Concluida</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
            <?php foreach($listaTarefas as $tarefa): ?>
                <tr>
                    <td><?php echo $tarefa->getNome(); ?></td>
                    <td><?php echo $tarefa->getDescricao(); ?></td>
                    <td><?php echo mostra_data($tarefa->getPrazo()); ?></td>
                    <td><?php echo traduz_prioridade($tarefa->getPrioridade()); ?></td>
                    <td><?php echo tarefa_concluida($tarefa->getConcluido()); ?></td>
                    <td class="opcao-editar">
                        <a class="links-opcoes" href="editar.php?id=<?php echo $tarefa->getId(); ?>">Editar</a>
                    </td>
                    <td class="opcao-deletar">
                        <a class="links-opcoes" href="deletar.php?id=<?php echo $tarefa->getId(); ?>" onclick="return confirm('Confirme para deletar')">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>