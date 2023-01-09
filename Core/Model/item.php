<?php

namespace Core\Model;

use Core\Base\Model;

class item extends Model
{
    public function valid(string $item)
    { 
        $result = $this->connection->query("SELECT * FROM $this->table WHERE item_name='$item'");
        if ($result) { // if there is an error in the connection or if there is syntax error in the SQL.
            if ($result->num_rows > 0) {
                return $result->fetch_object();
            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }

    public function bcode(string $code){

            $result = $this->connection->query("SELECT * FROM $this->table WHERE barcode=$code");
            return $result->fetch_object();
    }

    public function getStore()
    { 
        $result = $this->connection->query("SELECT * FROM $this->table");
        $ar = [];
        while ($row = $result->fetch_assoc()) {
            $ar[] = $row;
        }
        return ['status'=> 202, 'message'=> $ar]; ;
        
    }

    public function top()
    { 
        $result = $this->connection->query("SELECT * FROM $this->table ORDER BY buying_price ASC LIMIT 5");
        if ($result) { 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    $items[] = $row;
                }
                return $items; 
            } else {
                return 0;
            }
        } else {
            return 0;
        }
        
    }

    public function del(string $quantity1,string $qq , string $name){
        $tot = intval($qq) - intval($quantity1);  

if($tot>= 0){
    $q = $this->connection->query("UPDATE `items` SET 
    `quantity` = '$tot'
     WHERE item_name  = '$name'");
}else{
    $q= false;
}
       

if ($q) {
    return ['status'=> 202, 'message'=> 'cart add Successfully'];
}else{
    return ['status'=> 303, 'message'=> 'Failed to run query number low '.$qq];
}

	}

    public function more(string $quantity1,string $qq , string $name){
        $tot = intval($qq) + intval($quantity1);  

if($tot> 0){
    $q = $this->connection->query("UPDATE `items` SET 
    `quantity` = '$tot'
     WHERE item_name  = '$name'");
}else{
    $q= false;
}
       

if ($q) {
    return ['status'=> 202, 'message'=> 'cart add Successfully'.$tot];
}else{
    return ['status'=> 303, 'message'=> 'Failed to run query number low '.$qq];
}

	}

    public function updateItemWith(string $id ,string $barcode  , string $item_name   ,string $selling_price   ,string $buying_price  ,string $quantity,string $image ){

        $y = date('Y-m-d H:m:s mss');
			$q = $this->connection->query("UPDATE `items` SET 
            `barcode` = '$barcode',
            `item_name` = '$item_name',  
            `selling_price` = '$selling_price',
            `buying_price` = '$buying_price',
            `quantity` = '$quantity',
            `image` = '$image'
             WHERE id = '$id'");

			if ($q) {
				return ['status'=> 202, 'message'=> 'User updated'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}

	}

    public function updateItemWithout(string $id ,string $barcode  , string $item_name   ,string $selling_price   ,string $buying_price  ,string $quantity){

        $y = date('Y-m-d H:m:s mss');
			$q = $this->connection->query("UPDATE `items` SET 
            `barcode` = '$barcode',
            `item_name` = '$item_name',  
            `selling_price` = '$selling_price',
            `buying_price` = '$buying_price',
            `quantity` = '$quantity'
    
             WHERE id = '$id'");

			if ($q) {
				return ['status'=> 202, 'message'=> 'User updated'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}

	}



    public function get_by_barcode($x){
            $result = $this->connection->query("SELECT * FROM $this->table WHERE barcode=$x");
            $ar = [];
            while ($row = $result->fetch_assoc()) {
				$ar[] = $row;
			}
            return ['status'=> 202, 'message'=> $ar]; ;
    }

}

