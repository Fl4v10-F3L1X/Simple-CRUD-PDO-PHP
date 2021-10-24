<?php

namespace App\Db;
use \PDO;
use \PDOException;


class Database{

    /**
     * Host de Conexao com o banco de dados
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Nome do banco de dados
     * @var string
     */

    const NAME = 'phpoo';

    /**
     * Usuario do banco
     * @var string
     */
    const USER = 'root';

    /**
     * Senha de Acesso ao banco de dados
     * @var string
     */
    const PASS ='1234';

    /**
     * Nome da tabela a ser manipulada
     * @var string
     */
    private $table;

    /**
     *Instancia de conexao
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela e instancia e conexao
     * @param string $table
     */

    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Metodo responsavel por criar uma conexao com o banco de dados
     * 
     */
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Metodo responsavel por executar queries dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Metodo Responsavel por inserir dados no banco
     * @param array $values [field => value]
     * @return integer ID inserido
     */
    public function insert($values){
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?');

        //MONTA A QUERY 
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        $this->execute($query,array_values($values));

        return $this->connection->lastInsertId();
    }

    /**
     * Metodo responsavel por obter as vagas do banco
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        //MONTA A QUERY
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        //EXECUTA A QUERY
        return $this->execute($query);
    }


    /**
     * Metodo responsavel por atualizacoes
     * @param string $where
     * @param array $values
     * @return boolean
     */
    public function update($where,$values){
        //DADOS da query
        $fields = array_keys($values);
        //Monta a query
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
      
                   
        //EXecutar a Query
       $this->execute($query,array_values($values));

        return true;
    }

    /**
     * Metodo responsavel por excluir dados do banco
     * @param string $where
     * @return boolean
     */
    public function delete($where){
        //MOnta query
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        //EXECUTA COM SUCESSO
        $this->execute($query);

        //RETORNA
        return true;
    }
}