<?php
/**
 * As classes DAO servem para fazer os SQL junto com o banco de dados
 */
class ProdutoDAO
{
    /**
     * Serve para armazenar as informações com o banco de dados
     */
    private $conexao;


    /**
     * Método construtor, sempre chamado quando a classe é chamada.
     * Exemplo de instanciar classe (criar objeto da classe):
     * $dao = new ProdutoDAO();
     * Neste caso, assim que é chamado, abre uma conexão com o MySQL (Banco de dados)
     * A conexão é aberta via PDO (PHP Data Object) que é um recurso da linguagem para
     * acesso a diversos SGBDs.
     */
    function __construct() 
    {
        // DSN (Data Source Name) onde será encontrado o servidor MySQL e qual acesso para
        // o MySQL e o nome do banco criado.
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        // Criando a ligaçao e armazenando as informações no lugar definido.
        $this->conexao = new PDO($dsn, $user, $pass);
    }


    /**
     * Ação que chama um model e pega os dados do model para colocar na tabela 
     * que pertence ao model.
     */
    function insert(ProdutoModel $model) 
    {
        // Trecho de código SQL com marcadores ? para substituição posterior, no prepare   
        $sql = "INSERT INTO produto 
                (produto, codigo_barra, data_fabric) 
                VALUES (?, ?, ?)";
        
        // Na variável stmt é onde terá a montagem da consulta. Ali na ação prepare está acessando
        // a ligação com MySQL, usando uma seta "->". Ou seja, o prepare está por dentro 
        // da propriedade $conexao e tendo a string sql.
        $stmt = $this->conexao->prepare($sql);

        // O bindValue está sendo usado para acessar a model e com a seta, chamar o dado
        // que deseja pegar para a posição em questão.
        $stmt->bindValue(1, $model->produto);
        $stmt->bindValue(2, $model->codigo_barra);
        $stmt->bindValue(3, $model->data_fabric);
        
        // Ao fim, onde todo SQL está montando, executamos a consulta.
        $stmt->execute();      
    }
}