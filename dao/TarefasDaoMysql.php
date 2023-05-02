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

    public function findById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM tarefas WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $item = $sql->fetch();

            $t = new Tarefas();
            $t->setId($item['id']);
            $t->setNome($item['nome']);
            $t->setDescricao($item['descricao']);
            $t->setPrazo($item['prazo']);
            $t->setPrioridade($item['prioridade']);
            $t->setConcluido($item['concluida']);

            return $t;
        } else {
            return false;
        }
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
        $sql = $this->pdo->prepare("DELETE FROM tarefas WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function edit(Tarefas $t)
    {
        $sql = $this->pdo->prepare("UPDATE tarefas SET nome = :nome, descricao = :descricao, prazo = :prazo, prioridade = :prioridade, concluida = :concluida WHERE id = :id");
        $sql->bindValue(':nome', $t->getNome());
        $sql->bindValue(':descricao', $t->getDescricao());
        $sql->bindValue(':prazo', traduz_data_para_banco($t->getPrazo()));
        $sql->bindValue(':prioridade', $t->getPrioridade());
        $sql->bindValue(':concluida', $t->getConcluido());
        $sql->bindValue(':id', $t->getId());    
        $sql->execute();

        return true;
    }
}