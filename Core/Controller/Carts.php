<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\Cart;
use Core\Model\item;
use Core\Model\tran;

class Carts extends Controller
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
     * getitems
     *
     * @return void
     */
    public function getitems(){
        $cart = new Cart();
        echo json_encode($cart->get_all()); 
    }
    
    /**
     * createcarts
     *
     * @return void
     */
    public function createcarts()
    {
           $cart = new Cart();
           $item = new Item();

           if($item-> del($_POST["q"] ,$_POST["qq"] , $_POST["name"])["status"]==303){

            echo json_encode($item-> del($_POST["q"] ,$_POST["qq"] , $_POST["name"]));
           }else{
            echo json_encode( $cart-> add($_SESSION['user']["user_id"],$_POST["name"],$_POST["q"],$_POST["price"],$_POST["t"],$_POST["item_id"]));
           }
        
    }

        
    /**
     * addcarts
     *
     * @return void
     */
    public function addcarts()
    {
           $cart = new Cart();
           $item = new Item();
           $cart-> add($_SESSION['user']["user_id"],$_POST["name"],$_POST["q"],$_POST["ss"],$_POST["t"],$_POST["item_id"]);

           echo json_encode( $item-> more($_POST["q"] ,$_POST["qq"] , $_POST["name"])); 
    }


    
    /**
     * delete
     *
     * @return void
     */
    public function delete(){
        $cart = new Cart();

        if (isset($_SESSION['user'])) {
            if(!empty($_POST['pid'])){
                $pid = $_POST['pid'];
                $cart->delete($pid);
                echo json_encode(['status'=> 202, 'message'=> 'item delete Successfully']);
                exit();
            }else{
                echo json_encode(['status'=> 303, 'message'=> 'Invalid product id']);
                exit();
            }
        }else{
            echo json_encode(['status'=> 303, 'message'=> 'Invalid Session']);
        } 
    }
    
    /**
     * end
     *
     * @return void
     */
    public function end(){
        $cart = new Cart();
        $trans= new tran();
        

        if (isset($_SESSION['user'])) {
          $items=  $cart->getProducts($_SESSION['user']["user_id"]);
          

        foreach ($items as $item){
            $trans->putData( $item->quantity,$item->total, $item->item_id);
            $cart->delete($item->id);
        } 

        

        }else{
            echo json_encode(['status'=> 303, 'message'=> 'Invalid Session']);
        } 
    }

}