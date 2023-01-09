<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\tran;

class Trans extends Controller
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
     * move to trans file to index page
     * get all transaction data
     * get count of transaction
     * @return void
     */
    public function firstview()
    {
        $this->view = 'trans.index';
        $tran = new tran(); // new model item.
        $this->data['trans'] = $tran->get_all();
        $this->data['trans_count'] = count($tran->get_all());
    }    
    
    /**
     * items
     * get all tansactions
     * @return void
     */
    public function items(){
        $tran = new tran();
        echo json_encode($tran->get_all()); 
    }

    /**
     * update
     * update tansactions
     * @return void
     */
    public function update(){
        $tran = new tran();
        $tran->updateTrans($_POST["pid"]   ,$_POST["e_barcode"],$_POST["e_item_q"],$_POST["e_trans_a"]); 
    }

    
    /**
     * delete
     * delete transaction by id
     * @return void
     */
    public function delete()
    {
        $tran = new tran();
        $tran->delete($_POST['pid']);
        echo json_encode(['status'=> 202, 'message'=> 'transaction delete Successfully']);
    }
}
