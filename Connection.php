<?php

class Connection{

    private $_dbHostName = "localhost";
    private $_dbName = "db_luxlingerie";
    private $_userName = "root";
    private $_dbPassword = '0FF$et08';
    private $_conexao;


    public function __construct(){
        
        try {
            
            $this->_conexao = new PDO("mysql:host =$this->_dbHostName;dbname=$this->_dbName;", 
                                    $this->_userName, 
                                    $this->_dbPassword);
            
            $this->_conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            
            echo "Connection error:" . $e->getMessage();

        }

    }

    public function returnConnection(){
        return $this->_conexao;
    } 

}

?>