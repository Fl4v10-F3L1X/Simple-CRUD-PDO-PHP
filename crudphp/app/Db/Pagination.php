<?php

namespace App\Db;

class Pagination{

    /**
     * Numero maximo de resgitro por pagina
     * @var integer
     */
    private $limit;

    /**
     * Quantidade total do resultado do banco
     * @var integer
     */
    private $results;

    /**
     * qUANTIDADE DE PAGINAS
     * @var integer
     */
    private $pages;

    /**
     * PAgina atual
     * @var integer
     */
    private $currentPage;

    /**
     * contrutor da classe
     * @param integer
     * @param integer
     * @param integer
     */
    public function __construct($results, $currentPage = 1, $limit = 10)
    {
        $this->results = $results;
        $this->limit = $limit;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }

    /**
     * Metodo responsavel pela paginacao
     */
    private function calculate(){
        // calcula o total de de pagina
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

        //verifica se a pagina atual nao excede o numero de paginas
        $this->currentPage = $this->currentPage<= $this->pages ? $this->currentPage : $this->pages;
    }

    /**
     * Metodo responsavel por retornar a clausula limit
     * @return string
     */
    public function getLimit(){
        $offset = ($this->limit *($this->currentPage - 1));
        return $offset.','.$this->limit;
    }

    /**
     * Metodo responsavel por retornar as opcoes
     */
    public function getPages(){
        // NAO RETORNA PAGINAS
        if($this->pages == 1) return[];

            //PAGINAS
            $paginas = [];
            for($i =1; $i <= $this->pages; $i++){
                $paginas[] = [
                    'pagina' => $i,
                    'atual' => $i == $this->currentPage
                ];
            }

            return $paginas;
    }
}