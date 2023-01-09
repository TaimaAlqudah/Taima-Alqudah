<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;

class Login extends Controller
{

        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        function __construct()
        {
        }
        
        
        /**
         * login
         *  move to login page
         * @return void
         */
        public function login()
        {
                $this->view = 'login';
        }
        
        /**
         * validate
         * create user session information
         * @return void
         */
        public function validate()
        {

                $user = new User();
                $logged_in_user = $user->email($_POST['email']);

                if (!$logged_in_user) {
                        $this->invalid_redirect();
                }

                if ($_POST['password'] !== $logged_in_user->password) {
                        $this->invalid_redirect();
                }

                $_SESSION['user'] = array(
                        'username' => $logged_in_user->username,
                        'user_id' => $logged_in_user->id,
                        'user_role' => $logged_in_user->role,
                        'user_email' => $logged_in_user->email,
                        'user_password' => $logged_in_user->password,
                        'image' => $logged_in_user->image,
                        'is_admin_view' => true
                );
                if($logged_in_user->role =="Admin"){
                        Helper::redirect('/dashboard');
                }else if ($logged_in_user->role =="Procurement"){
                        Helper::redirect('/store');
                }else if ($logged_in_user->role =="Accountant"){
                        Helper::redirect('/trans');
                }else if ($logged_in_user->role =="Seller"){
                        Helper::redirect('/selling');
                }else {
                        Helper::redirect('/');
                }


                
        }

        
        /**
         * logout
         * sign out from website
         * @return void
         */
        public function logout()
        {
                \session_destroy();
                \session_unset();

                Helper::redirect('/');
        }
        
        /**
         * invalid_redirect
         * when wbsite open wrong page
         * @return void
         */
        private function invalid_redirect()
        {
                $_SESSION['error'] = "Invalid Username or Password";
                Helper::redirect('/');
                exit();
        }
}
