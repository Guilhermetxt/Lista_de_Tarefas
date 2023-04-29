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
            <form>
                <fieldset>
                    <legend>Nova Tarefa</legend>
                    <label>
                        <input class="form-cor" type="text" name="nome" placeholder="Tarefa" autocomplete="false">
                    </label>
                    <label>
                        <textarea class="form-cor" name="descicao" placeholder="Descrição (Opcional):"></textarea>
                    </label>
                    <label>
                        <input class="form-cor" type="text" name="prazo" placeholder="Prazo (Opcional):" autocomplete="off">
                    </label>
                    <fieldset>
                        <legend>Prioridade</legend>
                        <label for="prioridade">
                            <input type="radio" name="prioridade" id="prioridade" value="baixa" checked>
                            Baixa
                            <input type="radio" name="prioridade" id="prioridade" value="media">
                            Média
                            <input type="radio" name="prioridade" id="prioridade" value="alta">
                            Alta
                        </label>
                    </fieldset>
                    <label>
                        Tarefa Concluída:
                        <input type="checkbox" name="concluida" value="sim">
                    </label>
                    <input type="submit" value="Cadastrar">
                </fieldset>
            </form>

        <table>
            <tr>
                <th>Tarefas</th>
            </tr>
            <?php foreach($lista_tarefas as $tarefa): ?>
                <tr>
                    <td><?php echo $tarefa; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>