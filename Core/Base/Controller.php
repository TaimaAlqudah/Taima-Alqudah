<?php

namespace Core\Base;

use Core\Helpers\Helper;

abstract class Controller
{
    abstract public function render();

    protected $view = null;
    protected $data = array();
    protected $response = null;
   
    /**
     * SEND VIEW HTML TEMPLATE AND DATA
     * 
     * @return void
     */
    protected function view()
    {
        new View($this->view, $this->data);
    }

    /**
     * IF USER DOES'T EXISTING 
     * 
     * @return void
     */
    protected function auth()
    {
        if (!isset($_SESSION['user'])) {
            Helper::redirect('/');
        }
    }


    /**
     * If the administrator shows him the page
     * 
     * @param bool $switch
     * @return void
     */
    protected function admin_view(bool $switch): void
    {
        // check if the session user is existed
        // if not, do noting
        // if existed, check if $switch is true
        // if true, $_SESSION['user']['is_admin_view'] = true
        // if false, $_SESSION['user']['is_admin_view'] = false

        if (isset($_SESSION['user']['is_admin_view'])) {
            $_SESSION['user']['is_admin_view'] = $switch;
        }
    }
}
