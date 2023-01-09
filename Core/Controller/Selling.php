<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\item;
use Core\Model\Cart;


class selling extends Controller
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
     * show all cart and item
     * @return void
     */
    public function firstview()
    {
        $this->view = 'selling.index';
        $cart = new Cart();
        $item = new item; 
        $this->data['items'] = $item->get_all();
        $this->data['carts'] = $cart->get_all();
    }    
    /**
     * validate
     * create session user info 
     * @return void
     */
    public function validate()
    { 
            $_SESSION['item_error']="";
            
            $item = new item();
            $item_in = $item->valid($_POST['item_name']);
           
            if (!$item_in) {
                $_SESSION['item_error']="error name";
            }

            if ($_POST['item_q'] > $item_in->quantity) {
                $_SESSION['item_error']="error quantity";
            }

            $_SESSION['item'] = array(
                    'id' => $item_in->id,
                    'item_name' =>$item_in->item_name,
                    'item_price' =>$item_in->selling_price,
                    'item_quantity' => $item_in->quantity,
                    'item_quantity_intered' =>$_POST['item_q']
                    
            );

            Helper::redirect('/selling');
    }
    
}
