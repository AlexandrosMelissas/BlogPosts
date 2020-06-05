<?php 
    class Post {

        private $db;

        public function __construct() {

            $this->db = new Database;

        }




        public function getPosts() {
            $this->db->query('SELECT SUBSTRING(p.body, 1, 200) as body,u.name as author,u.id,p.id,p.author_id,p.title,p.created_at FROM posts p INNER JOIN users u ON u.id = p.author_id');
            $result = $this->db->resultMany();
            return $result;
        }

        public function getPost($id) {
            $this->db->query('SELECT u.name as author,u.id,p.id,p.body,p.title,p.author_id,p.created_at FROM posts p INNER JOIN users u ON u.id = p.author_id WHERE p.id = :id');
            $this->db->bind(':id',$id);
            $result = $this->db->resultOne();
            return $result;
        }

        public function deletePost($id) {
            $this->db->query('DELETE FROM posts WHERE id = :id');
            $this->db->bind(':id',$id);
            return $this->db->execute();
        }

        public function editPost($id,$title,$body) {
            $this->db->query('UPDATE posts SET title = :title,body = :body WHERE id = :id');
            $this->db->bind(':id',$id);
            $this->db->bind(':title',$title);
            $this->db->bind(':body',$body);
            return $this->db->execute();
        }

        public function createPost($author_id,$title,$body) {
            $this->db->query('INSERT into posts (author_id,title,body) VALUES (:author_id,:title,:body) ');
            $this->db->bind(':author_id',$author_id);
            $this->db->bind(':title',$title);
            $this->db->bind(':body',$body);
            return $this->db->execute();
        }

    }