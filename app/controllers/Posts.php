<?php
    class Posts extends Controller {

        public function __construct() {
            $this->postModel = $this->model('Post');
        }

        
        public function all() {
            $data =  $this->postModel->getPosts();
            $this->view('posts/all',$data);
        }

        public function post($id) {
            $data = $this->postModel->getPost($id);
            $this->view('posts/one',$data);
        }

        public function delete($id) {
            $deletedPost = $this->postModel->deletePost($id);
            if($deletedPost) {
                $data =  $this->postModel->getPosts();
                $this->view('posts/all',$data);
                redirect('posts/all');
  
            } else {
                $data = $this->postModel->getPost($id);
                $this->view('posts/one',$data);
                redirect('posts/one');
            }
        }

        public function edit($id) {
            if($_SERVER['REQUEST_METHOD'] == 'GET') {
                $data = $this->postModel->getPost($id);
                $this->view('posts/edit',$data);
            } elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = trim($_POST['title']);
                $body = trim($_POST['body']);
                $editedPost = $this->postModel->editPost($id,$title,$body);

                if($editedPost) {
                    $data =  $this->postModel->getPosts();
                    $this->view('posts/all',$data);
                    redirect('posts/all'); 
                } else {
                    $data = $this->postModel->getPost($id);
                    $this->view('posts/edit',$data);
                }
            }
         
        }

        public function new() {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                
            $author_id = $_SESSION['user_id'];
            $title = trim($_POST['title']);
            $body = trim($_POST['body']);
            $createdPost =  $this->postModel->createPost($author_id,$title,$body);
            if($createdPost) {
                $data =  $this->postModel->getPosts();
                $this->view('posts/all',$data);
                redirect('posts/all');
            } else {
                die('Something went wrong');
            }

            } elseif($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->view('posts/new');
            }

        }

        
        public function isAuthor($user_id,$author_id) {
            if($user_id == $author_id) {
                return true;
            } else {
                return false;
            }
        }
    }