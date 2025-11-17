<?php
    namespace Config;

    use PDO;

    class Database {
        private $dbhost = '127.0.0.1';
        private $dbname = 'test';
        private $dbuser = 'root';
        private $dbpass = '';
        private $charset = 'utf8';
        private $pdo;

        public function connect() {
            try {
                $this->pdo = new PDO(
                    "mysql:host={$this->dbhost};dbname={$this->dbname};charset={$this->charset}",
                    $this->dbuser,
                    $this->dbpass,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
                return $this->pdo;
            } catch (\PDOException $e) {
                error_log("Подключение не удалось: " . $e->getMessage());
                die();
            }
        }
    }