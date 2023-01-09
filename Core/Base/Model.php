<?php

namespace Core\Base;

class Model
{
    public $connection;
    protected $table;

    public function __construct()
    {
        $this->connection(); // connection is ready
        $this->relate_table();
    }

    public function __destruct()
    {
        $this->connection->close();
    }

    public function get_all(): array
    {
        $data = array();
        $result = $this->connection->query("SELECT * FROM $this->table");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getBy($pid=null)
    {
        $data = array();
        $result = $this->connection->query("SELECT * FROM $this->table WHERE id = '$pid'");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data[0];
    }

    public function delete($pid=null)
    {
        if ($pid != null) {
			$q = $this->connection->query("DELETE FROM $this->table WHERE id = '$pid'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Product removed from stocks'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Invalid product id'];
		}
    }

    public function create($data)
    {
        // Get dynamic keys title, contenta
        // $keys: string
        // Get dynamic values coresponds to the key '$data->title','$data->content'
        // $values: string

        $keys = '';
        $values = '';

        foreach ($data as $key => $value) {

            if ($key != \array_key_last($data)) {
                $keys .= $key . ', ';
                $values .= "'$value', ";
            } else {
                $keys .= $key;
                $values .= "'$value'";
            }
        }
        $sql = "INSERT INTO $this->table ($keys) VALUES ($values)";
        $this->connection->query($sql);
    }

    public function update($data)
    {
        $set_values = '';
        $id = 0;

        foreach ($data as $key => $value) {
            if ($key == 'id') {
                $id = $value;
                continue;
            }
            if ($key != \array_key_last($data)) {
                $set_values .= "$key='$value', ";
            } else {
                $set_values .= "$key='$value'";
            }
        }
        $sql = "UPDATE $this->table 
            SET $set_values
            WHERE id=$id
        ";
        $this->connection->query($sql);
    }

    protected function connection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "store";

        // Create connection
        $this->connection = new \mysqli($servername, $username, $password, $database);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    protected function relate_table()
    {
        $table_name = \get_class($this);
        $table_name_arr = \explode('\\', $table_name);
        $class_name = $table_name_arr[\array_key_last($table_name_arr)]; // $table_name_arr[2]
        $final_clas_name = \strtolower($class_name) . "s";
        $this->table = $final_clas_name;
    }
}
