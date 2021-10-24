<?php

namespace App\Entity;
use \App\Db\Database;
use \PDO;

class Usuario{

    /**
     * Identificador unico do usuario
     * @var integer
     */
    public $id;

    /**
     * Nome do usuario
     * @var string
     */
    public $nome;

    /**
     * E-mail do usuario
     * @var string
     */
    public $email;

    /**
     * Hash da senha do usuario
     * @var string
     */
    public $senha;

    /**
     * Metodo responsavel por cadastrar um novo usuario
     * @return boolean
     */
    public function cadastrar(){
        //DATABASE
        $obDatabase = new Database('utilizadores');

        //INSERE UM NOVO USUARIO
        $this->id = $obDatabase->insert([
                                        'nome' => $this->nome,
                                        'email' => $this->email,
                                        'senha' => $this->senha
        ]);

        //SUCESSO
        return true;

    }

    /**
     * Metodo responsavel por retornar uma instancia de usuario com base em seu e-mail
     * @param string $email
     * @return Usuario
     */
    public static function getUsuarioPorEmail($email){
        return (new Database('utilizadores'))->select('email = "'.$email.'"')->fetchObject(self::class);
    }
}