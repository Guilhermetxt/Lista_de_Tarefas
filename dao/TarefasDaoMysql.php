<?php

require_once('models/Tarefas.php');
require_once('ajustes.php');


class TarefasDaoMysql implements TarefasDAO
{
    private $pdo;

    public function __construct(PDO $drive)
    {
        $this->pdo = $drive;
    }

    public function findByAll()
    {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM tarefas");

        if ($sql->rowCount() > 0) {
            $items = $sql->fetchAll();

            foreach($items as $item) {
                $t = new Tarefas();
                $t->setId($item['id']);
                $t->setNome($item['nome']);
                $t->setDescricao($item['descricao']);
                $t->setPrazo($item['prazo']);
                $t->setPrioridade($item['prioridade']);
                $t->setConcluido($item['concluida']);

                $array[] = $t;
            }
        }

        return $array;
    }

    public function add(Tarefas $t)
    {
        $sql = $this->pdo->prepare("INSERT INTO tarefas (nome, descricao, prazo, prioridade, concluida) VALUES (:nome, :descricao, :prazo, :prioridade, :concluida)");
        $sql->bindValue(':nome', $t->getNome());
        $sql->bindValue(':descricao', $t->getDescricao());
        $sql->bindValue(':prazo', traduz_data_para_banco($t->getPrazo()));
        $sql->bindValue(':prioridade', $t->getPrioridade());
        $sql->bindValue(':concluida', $t->getConcluido());
        $sql->execute();

        $t->setId($this->pdo->lastInsertId());
    }

    public function delete($id)
    {

    }

    public function edit(Tarefas $t)
    {

    }
}