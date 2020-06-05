<?php 

    class Users extends Controller {

        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function register() {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                

                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                if(empty($data['name'])) {
                    $data['name_err'] = 'Please insert a name';
                }

                if(empty($data['email'])) {
                    $data['email_err'] = 'Please insert an email';
                } else {
                    if($this->userModel->checkUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                if(empty($data['password'])) {
                    $data['password_err'] = 'Please insert a password';
                } elseif(strlen($data['password']) < 6) {
                    $data['password_err'] = 'Please insert more than 6 characters';
                }

                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm your password';
                } elseif($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }

                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err'])
                   && empty($data['confirm_password_err'])) {
                       // success
                    
                    // Hash the password first
                   $data['password'] = password_hash($data['password'],PASSWORD_BCRYPT);
                    
                   if($this->userModel->register($data['name'],$data['email'],$data['password'])) {
                    
                    redirect('users/login');
                    
                   } else {
                      die('Something went wrong');
                   }
                   } else {
                       // Load the view with errors
                        $this->view('users/register',$data);
                   }

            
            } else {
                // Display the register page

                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                $this->view('users/register',$data);
            }

        }


        public function login() {


            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];


                if(empty($data['email'])) {
                    $data['email_err'] = 'Please insert an email';
                }

                if(empty($data['password'])) {
                    $data['password_err'] = 'Please insert a password';
                } elseif(strlen($data['password']) < 6) {
                    $data['password_err'] = 'Please insert more than 6 characters';
                }


                if(empty($data['email_err']) && empty($data['password_err'])) {
                       // success
                       $loggedInUser = $this->userModel->login($data['email'],$data['password']);
                       if($loggedInUser) {
                        // Successful login
                        $this->createSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Failed to login. Please try again';
                        $this->view('users/login',$data);
                    }
                    } else {
                       // Load the view with errors
                        $this->view('users/login',$data);
                   }

              
            
            } else {
                // Display the register page

                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                $this->view('users/login',$data);
            }

        }

        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_email']);
            session_destroy();
            redirect('users/login');
        }

        public function isLoggedIn() {
            if(isset($_SESSION['user_id'])){
                return true;
            } else {
                return false;
            }
        }


        public function createSession($user) {
            session_start();
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_email'] = $user->email;
            redirect('posts/all');
        }

    }