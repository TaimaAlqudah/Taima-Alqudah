<?php

namespace Core\Base;

class View
{
    public function __construct(string $view, array $data = array())
    {
        $view = \str_replace('.', '/', $view);
        $data = (object) $data;

        $header = 'header';
        $footer = 'footer';

        if (isset($_SESSION['user']['is_admin_view'])) {
            if ($_SESSION['user']['is_admin_view']) {
                $header = 'header-admin';
                $footer = 'footer-admin';
            }
        }else{
            $header = 'head';
        }


        include_once \dirname(__DIR__, 2) . "/resources/views/partials/$header.php"; 

        include_once \dirname(__DIR__, 2) . "/resources/views/$view.php";

        include_once \dirname(__DIR__, 2) . "/resources/views/partials/$footer.php"; 
    }
}
