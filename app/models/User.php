<?php 
    class User {
        private $db;

        public function __construct() {
      
            $this->db = new Database;
        }



        public function checkUserByEmail($email) {

            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email',$email);
            $result = $this->db->resultOne();

            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }


        }

        public function register($name,$email,$password) {

            $this->db->query('INSERT into users (name,email,password) 
            VALUES (:name,:email,:password)');
            $this->db->bind(':name',$name);
            $this->db->bind(':email',$email);
            $this->db->bind(':password',$password);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }

        }

        public function login($email,$password) {

            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email',$email);

            $row = $this->db->resultOne();
            if($this->db->rowCount() > 0) {
                $hashed_password = $row->password;
                if(password_verify($password,$hashed_password)) {
                    return $row;
                } else {
                    return false;
                }
            } else {
                return false;
            }
           

        }

    }