<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\User;
use Core\Model\item;
use Core\Model\tran;

class Admin extends Controller
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
         * get all ussers , items and transaction data
         * get count of users , items and transaction  
         */
        public function firstview()
        {
                $this->view = 'dashboard';
                $user = new User;
                $this->data['users'] = $user->get_all();
                $this->data['users_count'] = count($user->get_all()); 
                $item = new item; 
                $this->data['items'] = $item->get_all();
                $this->data['items_count'] = count($item->get_all());
                $tran = new tran;
                $this->data['trans'] = $tran->get_all();
                $this->data['trans_count'] = count($tran->get_all());
                $this->data['top'] = $item->top();
                $this->data['tops_count'] = count($item->top());
                
        $total = 0.0 ; 

        if (isset($_SESSION['user'])) {
          $items=  $tran->get_all();
          

        foreach ($items as $item){
            $total += $item->transaction_amount;
        } 

        $this->data['total'] = $total;

        }
        }
}
