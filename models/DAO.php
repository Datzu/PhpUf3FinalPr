<?php

    class DAO implements iDAO {
        
        private $connection;
        private $dir = 'localhost';
        private $user = 'adrian';
        private $pass = 'adrian';
        private $db = 'genesis';


        public function __construct() {
            ;
        }
        
        public function startDefaultConnection() {
            try {
                $this->connection = mysqli_connect($this->dir, $this->user, $this->pass, $this->db);
            } catch (Exception $ex) {
                echo $ex;
            }
        }
        
        public function startConnection($dir, $user, $pass, $db) {
            try {
                $this->connection = mysqli_connect($dir, $user, $pass, $db);
            } catch (Exception $ex) {
                echo $ex;
            }
        }
        
        public function executeQuery($query) {
            return mysqli_query($this->connection, $query);
        }
        
        public function getRows($result) {
            return mysqli_num_rows($result);
        }

        public function close() {
            mysqli_close($this->connection);
        }

}
    
    interface iDAO {
        
        public function startConnection($dir, $user, $pass, $db);
        public function executeQuery($query);
        public function getRows($result);
        public function close();

    }

?>