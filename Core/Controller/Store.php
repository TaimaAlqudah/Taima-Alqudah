<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\item;

class store extends Controller
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
     * more to store file open all_items page
     * get all items data
     * get count of items
     * @return void
     */
    public function firstview()
    {
        $this->view = 'store.All_items';
        $item = new item; 
        $this->data['items'] = $item->get_all();
        $this->data['items_count'] = count($item->get_all());
    }
    
    /**
     * bcode
     * get item by bar code that send
     * @return void
     */
    public function bcode(){
        $item = new item;
        echo json_encode($item ->bcode($_GET["item"])); 
    }
    
    /**
     * getitems
     * get all items inside store
     * @return void
     */
    public function getitems(){
        $cart = new item();
        echo json_encode($cart->get_all()); 
    }
    
    /**
     * createitems
     * create item by form data
     * @return void
     */
    public function createitems()
    {
        $item = new item();

        if(isset($_FILES)){
            $fileName = $_FILES["image"]["name"];
            $fileNameAr= explode(".", $fileName);
            $extension = end($fileNameAr);
            $ext = strtolower($extension);

            $uniqueImageName = $_FILES['image']["name"];
            $_POST["image"] = $uniqueImageName ;
            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/resources/img/".$uniqueImageName);
            
            $item->create($_POST);
        }
 
        $this->data['items_count'] = count($item->get_all());

    }

    
    /**
     * updateitems
     * update item by id inside store 
     * @return void
     */
    public function updateitems()
    { 
         $item = new item();

        if(isset($_FILES['image']['name']) 
        && !empty($_FILES['image']['name'])){
            $fileName = $_FILES["image"]["name"];
            $fileNameAr= explode(".", $fileName);
            $extension = end($fileNameAr);
            $ext = strtolower($extension);

            $uniqueImageName = $_FILES['image']["name"];
            $_POST["image"] = $uniqueImageName ;
            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/resources/img/".$uniqueImageName);
          
            $item->updateItemWith($_POST["pid"],$_POST["barcode"],$_POST["item_name"],$_POST["selling_price"],$_POST["buying_price"],$_POST["quantity"],$_POST["image"]);
        }else {
            $item->updateItemWithout($_POST["pid"],$_POST["barcode"],$_POST["item_name"],$_POST["selling_price"],$_POST["buying_price"],$_POST["quantity"]);
        }


        $this->data['items_count'] = count($item->get_all());
     
        
    }
    
    /**
     * deleteitems
     * delete item in store
     * @return void
     */
    public function deleteitems()
    {
        $item = new item();
        $item->delete($_POST['pid']);
        $this->data['items_count'] = count($item->get_all());
    }
}
