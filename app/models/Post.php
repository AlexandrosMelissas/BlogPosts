<?php 
    class Post {

        private $db;

        public function __construct() {

            $this->db = new Database;

        }




        public function getAllPosts() {
            $this->db->query('SELECT SUBSTRING(p.body, 1, 200) as 
            body,u.name as author,u.id,p.image,p.id,p.author_id,p.title,p.created_at 
            FROM posts p INNER JOIN users u 
            ON u.id = p.author_id ORDER BY p.created_at DESC');
            $result = $this->db->resultMany();
            return $result;
        }

        public function getPosts() {
            $this->db->query('SELECT SUBSTRING(p.body, 1, 200) as 
            body,u.name as author,u.id,p.image,p.id,p.author_id,p.title,p.created_at 
            FROM posts p INNER JOIN users u 
            ON u.id = p.author_id ORDER BY p.created_at DESC LIMIT 5');
            $result = $this->db->resultMany();
            return $result;
        }

        public function getPostsCount() {
            $this->db->query('SELECT * FROM posts');
            $this->db->execute();
            $rows = $this->db->rowCount();
            return $rows;
        }

        public function getPost($id) {
            $this->db->query('SELECT u.name as 
            author,p.image,u.id,p.id,p.body,p.title,p.author_id,p.created_at 
            FROM posts p INNER JOIN users u ON u.id = p.author_id 
            WHERE p.id = :id ORDER BY p.created_at DESC');
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

        public function createPost($author_id,$title,$body,$topic_id,$filename = null) {
           
            if($filename) {
                $this->db->query('INSERT into posts (author_id,title,body,topic_id,image) VALUES (:author_id,:title,:body,:topic_id,:image) ');
                $this->db->bind(':image', URLROOT . '/public/img/' . $filename );
            } else {
                $this->db->query('INSERT into posts (author_id,title,body,topic_id) VALUES (:author_id,:title,:body,:topic_id) ');
            }
            $this->db->bind(':author_id',$author_id);
            $this->db->bind(':title',$title);
            $this->db->bind(':body',$body);
            $this->db->bind(':topic_id',$topic_id);
            return $this->db->execute();
        }

        public function searchPosts($input) {
            $this->db->query("SELECT SUBSTRING(p.body, 1, 200) as 
                              body,u.name as 
                              author,u.id,p.image,p.id,p.author_id,p.title,p.created_at 
                              FROM posts p INNER JOIN users u ON u.id = p.author_id WHERE body LIKE :input OR title LIKE :input ORDER BY p.created_at DESC ");
            $this->db->bind(':input','%' . $input . '%');
            $result = $this->db->resultMany();
            return $result;
        }

        public function searchByTopic($topic) {
            $this->db->query("SELECT SUBSTRING(p.body, 1, 200) as 
                              body,u.name as 
                              author,u.id,p.image,p.id,p.author_id,p.title,p.created_at 
                              FROM posts p 
                              INNER JOIN users u 
                              ON u.id = p.author_id
                              INNER JOIN topics t
                              ON t.id = p.topic_id
                              WHERE t.name = :topic ORDER BY p.created_at DESC ");
            $this->db->bind(':topic',$topic);
            $result = $this->db->resultMany();
            return $result;
        }

    }