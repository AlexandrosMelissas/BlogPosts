<?php
    
    class Database {

        private $host = DBHOST;
        private $user = DBUSER;
        private $pass = DBPASS;
        private $dbname = DBNAME;

        private $dbhandler;
        private $stmt;
        private $error;


        public function __construct() {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $options = array(
                // Pesistent connection,checks if there is a connection already
                PDO::ATTR_PERSISTENT => true, 
                // Better way to display errors
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            );

            try {

                $this->dbhandler = new PDO($dsn,$this->user,$this->pass,$options);

            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }



        public function query($sql) {
            $this->stmt = $this->dbhandler->prepare($sql);
        }

        public function bind($param, $value, $type = null) {

            if(is_null($type)) {
                switch(true) {
                    case is_int($value) :
                        $type = PDO::PARAM_INT;
                    break;
                    case is_bool($value) :
                        $type = PDO::PARAM_BOOL;
                    break;
                    case is_null($value) :
                        $type = PDO::PARAM_NULL;
                    break;
                    default :
                        $type = PDO::PARAM_STR;
                }
            }

            $this->stmt->bindValue($param,$value,$type);

        }

        public function execute() {
            return $this->stmt->execute();
        }

        public function resultMany() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function resultOne() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);

        }

        public function rowCount() {
            return $this->stmt->rowCount();
        }

    }