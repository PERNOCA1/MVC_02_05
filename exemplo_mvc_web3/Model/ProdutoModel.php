<?php

class ProdutoModel
{
    /**
     * Está falando as propriedades de cada informação da tabela la no banco de dados
     */
    public $id, $nome, $rg, $cpf;
    public $data_nascimento, $email;
    public $telefone, $endereco;


    /**
     * Declaração do método save que chamará a DAO para gravar no banco de dados
     * o model preenchido.
     * Save é onde chamará a DAO para poder gravar informações no banco
     * de dados do model preenchido.     */
    public function save()
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        // Se id for nulo(null), quer dizer que trata-se de um novo registro
        // caso contrário, é um update poque a chave primária já existe.

        if($this->id == null) 
        {
            // No que estamos enviado o proprio objeto model para o insert, por isso do this
            $dao->insert($this);
        } else {
            // update
        }
    }
}