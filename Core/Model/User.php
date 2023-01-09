<?php

namespace Core\Model;

use Core\Base\Model;

class User extends Model
{
    public function email(string $email)
    { 
        $result = $this->connection->query("SELECT * FROM $this->table WHERE email='$email'");
        if ($result) { 

            if ($result->num_rows > 0) {
                return $result->fetch_object();
            } else {
                return false;
            }
            
        } else {
            return false;
        }
        
    }
    public function getUser(string $id)
    { 
        $result = $this->connection->query("SELECT * FROM $this->table WHERE id='$id'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;
        
    }
    public function checkemail(string $email)
    { 
        $result = $this->connection->query("SELECT * FROM $this->table WHERE email='$email'");
        if ($result) { 

            if ($result->num_rows > 0) {
                return false;
            } else {
                return true;
            }
            
        } else {
            return false;
        }
        
    }
    	
	public function addCa($name ,  $email, $password, $role, $file){
		$q = $this->connection->query("SELECT * FROM user WHERE username = '$name' LIMIT 1");
		if ($q->num_rows > 0) {
			return ['status'=> 303, 'message'=> 'user already exists'];
		}else{
				if ($file['size'] > (1024 * 2)) {
					
					$uniqueImageName = $file;
					if (move_uploaded_file($file, $_SERVER['DOCUMENT_ROOT']."/resources/img/".$uniqueImageName)) {
						
						$q = $this->connection->query("INSERT INTO user (`username`  , `image` , `email` , `password` , `role`) VALUES ('$name', '$uniqueImageName' , '$email', '$password', '$role')");

						if ($q) {
							return ['status'=> 202, 'message'=> 'New user added Successfully'];
						}else{
							return ['status'=> 303, 'message'=> 'Failed to run query'];
						}
	
					}else{
						return ['status'=> 303, 'message'=> 'Failed to upload image'];
					}
	
				}else{
					return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB'];
				}
		}
	}

    public function updateUserWithImage(string $id , string $username  , string $image  ,string $email   ,string $password  ,string $role ){

        $y = date('Y-m-d H:m:s mss');
			$q = $this->connection->query("UPDATE `users` SET 
            `username` = '$username',
            `image` = '$image',  
            `email` = '$email',
            `password` = '$password',
            `role` = '$role',
            `updated_at` = '$y'
             WHERE id = '$id'");

			if ($q) {
				return ['status'=> 202, 'message'=> 'User updated'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}

	}

    public function updateUserWithOutImage(string $id , string $username ,string $email   ,string $password  ,string $role ){

        $y = date('Y-m-d H:m:s mss');
			$q = $this->connection->query("UPDATE `users` SET 
            `username` = '$username', 
            `email` = '$email',
            `password` = '$password',
            `role` = '$role',
            `updated_at` = '$y'
             WHERE id = '$id'");

			if ($q) {
				return ['status'=> 202, 'message'=> 'User updated'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}

	}

    public function updateProfile(string $id , string $username  , string $image  ,string $email   ,string $password ){

        $y = date('Y-m-d H:m:s mss');
			$q = $this->connection->query("UPDATE `users` SET 
            `username` = '$username',
            `image` = '$image',  
            `email` = '$email',
            `password` = '$password',
            `updated_at` = '$y'
             WHERE id = '$id'");

			if ($q) {
				return ['status'=> 202, 'message'=> 'User updated'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}

	}

}
