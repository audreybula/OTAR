<?php
    // Base Model Class
    abstract class Model {
        
        protected $dbh;
        protected $stmt;
        
        // Constructor
        public function __construct(){
            $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        }
        
        // Function to prepare an SQL query for execution
        public function query($query){
            $this->stmt = $this->dbh->prepare($query);
        }
        
        // Function to bind the query parameters to application data
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }
        
        // Function to execute an SQL statement
        public function execute(){
            $this->stmt->execute();
        }
        
        // Funtion to execute Insert or Update queries
        public function lastInsertId(){
            $this->dbh->lastInsertId();
        }
        
        // Function to return more than one matching record
        public function resultset(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // Function to return a single matching record
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
