<?php
    namespace Models;

    use Config\Database;

    class Result {
        private $pdo;

        public function __construct() {
            $database = new Database();
            $this->pdo = $database->connect();
        }

        public function select() {
            try {
                $stmt = $this->pdo->prepare("SELECT * FROM product");
                $stmt->execute();
                return $stmt->fetchAll();
            } catch(\Exception $e){
                error_log("Select: " .$e->getMessage());   
            }	
        }
    }