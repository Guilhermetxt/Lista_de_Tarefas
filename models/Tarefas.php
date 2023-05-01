<?php

class Tarefas 
{
    private $id;
    private $nome;
    private $descricao;
    private $prazo;
    private $prioridade;
    private $concluido;

    public function getId() 
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome() 
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao() 
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getPrazo() 
    {
        return $this->prazo;
    }

    public function setPrazo($prazo)
    {
        $this->prazo = $prazo;
    }

    public function getPrioridade() 
    {
        return $this->prioridade;
    }

    public function setPrioridade($prioridade)
    {
        $this->prioridade = $prioridade;
    }

    public function getConcluido() 
    {
        return $this->concluido;
    }

    public function setConcluido($concluido)
    {
        $this->concluido = $concluido;
    }
}

interface TarefasDAO
{
    public function findByAll();
    public function add(Tarefas $t);
    public function delete($id);
    public function edit(Tarefas $t);
}