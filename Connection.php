<?php

class Connection{

    private $_dbHostName = "localhost";
    //! - colocar o nome do banco
    private $_dbName = "";
    private $_userName = "root";
    private $_dbPassword = "bcd127";
    private $_conn;

    public function __construct(){
        
        try {
            
            $this->_conn = new PDO("mysql:host =$this->_dbHostName;dbname=$this->_dbName;", 
                                    $this->_userName, 
                                    $this->_dbPassword);
            
            $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            
            echo "Connection error:" . $e->getMessage();

        }

    }

    public function returnConnection(){
        return $this->_conn;
    } 

}

?>