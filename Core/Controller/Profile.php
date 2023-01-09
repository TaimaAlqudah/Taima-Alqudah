<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\User;
use Core\Helpers\Helper;

class Profile extends Controller
{
    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        $this->admin_view(false);
    }
    
    /**
     * getdata
     * move to profile page
     * @return void
     */
    public function getdata()
    {
        $this->view = 'profile';
    }    
    /**
     * updateprofile
     * update use info
     * @return void
     */
    public function updateprofile()
    { 
        $user = new User();
 
        if($_FILES["image"]["name"] != ""){
            $fileName = $_FILES["image"]["name"];
            $fileNameAr= explode(".", $fileName);
            $extension = end($fileNameAr);
            $ext = strtolower($extension);


            $uniqueImageName = $_FILES['image']["name"];
             $_POST["image"] = $uniqueImageName ; 
             move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/resources/img/".$uniqueImageName);
           
            
            
            $_SESSION["user"]["image"] = $_POST["image"] ; 

            if($_POST["password"]==""){
                $_POST['password']= $_SESSION["user"]["user_password"];
            }else {
                $_SESSION["user"]["user_password"] =$_POST['password']; 
            }
                 
            $user->updateProfile($_POST['id'],$_POST['username'],$_POST['image'],$_POST['email'],$_POST['password']);
            $_SESSION["user"]['username'] = $_POST['username'];
            $_SESSION["user"]['user_email'] = $_POST['email'];
            $_SESSION["user"]['user_password'] = $_POST['password'];

            echo json_encode(['status'=> 202]);
            
        }else {
             $_POST["image"] = $_SESSION["user"]["image"]  ; 

           
             if($_POST["password"]==""){
                $_POST['password']= $_SESSION["user"]["user_password"];
             }else {
                $_SESSION["user"]["user_password"] = $_POST['password']; 
            }
                         
           
            $user->updateProfile($_POST['id'],$_POST['username'],$_POST['image'],$_POST['email'],$_POST['password']);
            $_SESSION["user"]['username'] = $_POST['username'];
            $_SESSION["user"]['user_email'] = $_POST['email'];
            $_SESSION["user"]['user_password'] = $_POST['password'];

            echo json_encode(['status'=> 202]);
        }

    }

}
