<?php

namespace Core\Model;

use Core\Base\Model;

class tran extends Model
{
    public function putData(string $item_quantity,string $transaction_amount , String $item_id )
    { 
        $y = date('Y-m-d H:m:s mss');
        $q = $this->connection->query("INSERT INTO `trans`( `item_quantity`, `transaction_amount`,`item_id`, `update_at`, `created_at`) VALUES ('$item_quantity','$transaction_amount','$item_id','$y','$y')");
        if ($q) {
            return ['status'=> 202, 'message'=> 'cart add Successfully'];
        }
        
    } 

    public function updateTrans(string $id,string $bar , string $q , String $trans_a){

        $y = date('Y-m-d H:m:s mss');
    $q = $this->connection->query("UPDATE `trans` SET 
    `item_id` = '$bar',
    `item_quantity` = '$q',
    `transaction_amount` = '$trans_a',
    `update_at` = '$y'
     WHERE id  = '$id'");

    }
}
