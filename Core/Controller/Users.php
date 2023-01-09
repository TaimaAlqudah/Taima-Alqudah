<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\User;

class Users extends Controller
{
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        function __construct()
        {
                $this->auth();
                $this->admin_view(true);
        }
        
        /**
         * firstview
         * move to users file open index page 
         * get all users data
         * get count of users
         * @return void
         */
        public function firstview()
        {
               /*  $this->permissions(['user:read']); */
                $this->view = 'users.index';
                $user = new User; // new model post.
                $this->data['users'] = $user->get_all();
                $this->data['users_count'] = count($user->get_all());
        }

                
        /**
         * show_info
         * move to profile page
         * @return void
         */
        public function show_info()
        {
        
        $this->view = 'profile';
        }
        public function pro()
        {
         $user = new User();

         $this->data['user'] = $user->getBy($_GET["id"]);
       // echo json_encode($user->getUser($_GET["id"])); 
        $this->view = 'users.profile';
        }
           
        /**
         * createuser
         * create new user after upload his/her photo
         * @return void
         */
        public function createuser()
        {

                if(isset($_FILES)){
                        $fileName = $_FILES["image"]["name"];
                        $fileNameAr= explode(".", $fileName);
                        $extension = end($fileNameAr);
                        $ext = strtolower($extension);
            
                        $uniqueImageName = $_FILES['image']["name"];
                        $_POST["image"] = $uniqueImageName ;
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/resources/img/".$uniqueImageName);
                        $user = new User();
                        $user->create($_POST);
                }
                    $user = new User; 
                    $this->data['users_count'] = count($user->get_all());
  
        }        
        /**
         * getall
         * get all users info 
         * @return void
         */
        public function getall(){
                $user = new User();
                echo json_encode($user->get_all()); 
        }
        /**
         * getUser
         * get all user info 
         * @return void
         */
        public function getUser(){
                $user = new User();
                echo json_encode($user->getUser($_GET["id"])); 
        }  
        /**
         * updateuser
         * uppdate user that his id send 
         * @return void
         */
        public function updateuser()
        {
                $user = new User();
                if(isset($_FILES['image']['name']) 
                && !empty($_FILES['image']['name'])){
                        $fileName = $_FILES["image"]["name"];
                        $fileNameAr= explode(".", $fileName);
                        $extension = end($fileNameAr);
                        $ext = strtolower($extension);
            
                        $uniqueImageName = $_FILES['image']["name"];
                        $_POST["image"] = $uniqueImageName ;
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/resources/img/".$uniqueImageName);
                      
                        $user->updateUserWithImage($_POST["pid"],$_POST["username"],$_POST["image"],$_POST["email"],$_POST["password"],$_POST["role"]);        
                } else {
                        $user->updateUserWithOutImage($_POST["pid"],$_POST["username"],$_POST["email"],$_POST["password"],$_POST["role"]); 
                }
                    $this->data['users_count'] = count($user->get_all());
        }
        
        /**
         * deleteuser
         * delete user by id 
         * @return void
         */
        public function deleteuser()
        {
                $user = new User();
                $user->delete($_POST['pid']);
                $this->data['users_count'] = count($user->get_all());
                echo json_encode(['status'=> 202, 'message'=> 'user delete Successfully']);
        }
}
