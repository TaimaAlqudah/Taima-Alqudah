<?php

namespace Core\Model;

use Core\Base\Model;

class cart extends Model
{
    public function add (string $user_id ,string $name ,string $quantity,string $price ,string $total , String $item_id )
    { 
        $q = $this->connection->query("INSERT INTO `carts`(`user_id`,`item_id`, `name`, `quantity`, `price`, `total`) VALUES ('$user_id','$item_id','$name','$quantity','$price','$total')");
   
        if ($q) {
            return ['status'=> 202, 'message'=> 'cart add Successfully'];
        }
    }

    public function getProducts($pid = null){
		if ($pid != null) {
			$q = $this->connection->query("SELECT * FROM $this->table WHERE user_id='$pid'");
            if ($q->num_rows > 0) {
                while ($row = $q->fetch_object()) {
                    $items[] = $row;
                }
                return $items; 
            } else {
              return 0 ;
            }
			
		}else{
			return ['status'=> 303, 'message'=>'Invalid product id'];
		}

	}
}
