<?php

class Partida
{
    private int $id;
    private string $nome;
    private int $qntdAcertos;
    private int $qntdErros;
    private string $dataehora;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getQntdErros(): int
    {
        return $this->qntdErros;
    }

    public function setQntdErros(int $qntdErros): self
    {
        $this->qntdErros = $qntdErros;
        return $this;
    }

    public function getQntdAcertos(): int
    {
        return $this->qntdAcertos;
    }

    public function setQntdAcertos(int $qntdAcertos): self
    {
        $this->qntdAcertos = $qntdAcertos;
        return $this;
    }

    public function getDataehora(): string
    {
        return $this->dataehora;
    }

    public function setDataehora(string $dataehora): self
    {
        $this->dataehora = $dataehora;
        return $this;
    }

}