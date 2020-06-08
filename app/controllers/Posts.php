<?php
    class Posts extends Controller {

        public function __construct() {
            $this->postModel = $this->model('Post');
        }

        
        public function all() {
            $posts =  $this->postModel->getAllPosts();
            $this->pagination = new Pagination;
            $number_of_posts = $this->postModel->getPostsCount();
            $data =  $this->pagination->paginate(1,$number_of_posts,$posts);
            $total_pages = $this->pagination->getTotalPages($number_of_posts);
            $data = [
                'data' => $data,
                'total_pages' => $total_pages,
                'current_page' => 1
            ];

            $this->view('posts/all',$data);
        }


        public function page($current_page) {
            $this->pagination = new Pagination;
            $posts = $this->postModel->getAllPosts();
            $number_of_posts = $this->postModel->getPostsCount();
            $data =  $this->pagination->paginate($current_page,$number_of_posts,$posts);
            $total_pages = $this->pagination->getTotalPages($number_of_posts);
            $data = [
                'data' => $data,
                'total_pages' => $total_pages,
                'current_page' => $current_page
            ];
            $this->view('posts/all',$data);

        }

        public function post($id) {
            $data = $this->postModel->getPost($id);
            $this->view('posts/one',$data);
        }

        public function delete($id) {
            $deletedPost = $this->postModel->deletePost($id);
            if($deletedPost) {
                $this->pagination = new Pagination;
                $posts = $this->postModel->getAllPosts();
                $number_of_posts = $this->postModel->getPostsCount();
                $data =  $this->pagination->paginate(1,$number_of_posts,$posts);
                $total_pages = $this->pagination->getTotalPages($number_of_posts);
                $data = [
                    'data' => $data,
                    'total_pages' => $total_pages,
                    'current_page' => 1
                ];
                redirect('posts/all');
                $this->view('posts/all',$data);
             
  
            } else {
                $data = $this->postModel->getPost($id);
                redirect('posts/one');
                $this->view('posts/one',$data);
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
                    $this->pagination = new Pagination;
                    $posts = $this->postModel->getAllPosts();
                    $number_of_posts = $this->postModel->getPostsCount();
                    $data =  $this->pagination->paginate(1,$number_of_posts,$posts);
                    $total_pages = $this->pagination->getTotalPages($number_of_posts);
                    $data = [
                        'data' => $data,
                        'total_pages' => $total_pages,
                        'current_page' => 1
                    ];
                    redirect('posts/all'); 
                    $this->view('posts/all',$data);
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
            $topic_id = trim($_POST['topic']);
            // Upload Directory for image
            if($_FILES["image"]["name"]){

                $target_dir = "./img/";
                // Name of the file will be the name of the uploaded file
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                // Upload the image
    
                // Check file format
                if(strtolower(pathinfo($target_file,PATHINFO_EXTENSION)) != 'png' &&
                        strtolower(pathinfo($target_file,PATHINFO_EXTENSION)) != 'jpg'
                ) {
                    die('File must be jpg or png format');
                
                } elseif($_FILES["image"]["size"] > 400000) {
                    die('File must be 4mb or less');
                } 
                $uploaded = move_uploaded_file($_FILES['image']["tmp_name"],$target_file);
                $filename = $_FILES['image']['name'];
                $createdPost =  $this->postModel->createPost($author_id,$title,$body,$topic_id,$filename);

            } else {
                $createdPost =  $this->postModel->createPost($author_id,$title,$body,$topic_id);

            }
       
            if($createdPost) {
                $data =  $this->postModel->getPosts();
                redirect('posts/all');
                $this->view('posts/all',$data);
               
            } else {
                die('Something went wrong');
            }

            } elseif($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->view('posts/new');
            }

        }

        public function search($topic = null) {
            if(!$topic) {
                $query = $_GET['query'];
                $data = $this->postModel->searchPosts(urldecode($query));
                $this->view('posts/found',$data);
            } else {
                $data = $this->postModel->searchByTopic($topic);
                $this->view('posts/foundByTopic',$data);

            }
  
            // redirect('posts/all');

        }

        
        public function isAuthor($user_id,$author_id) {
            if($user_id == $author_id) {
                return true;
            } else {
                return false;
            }
        }
    }