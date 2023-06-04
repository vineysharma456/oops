<?php
class database{
    private $db_host =  "localhost";
    private $db_user =  "root";
    private $db_pass = "";
    private $mysqli = "";
    private $conn = false;
    private $result = array();
    private $db_database = "oops";
    public function __construct(){

    
    if(!$this->conn){
        $this->mysqli = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_database);
         $this->conn = true;
        if($this->mysqli->connect_error){
            array_push($this->result,$this->mysqli,$this->mysqli->connect_error);
             return false;
        }
       else{
        return true;
       }
    }
        
    }
    public function insert($table,$params= array()){
        if($this->tableExists($table)){
            print_r($params);
            $table_columns = implode(',',array_keys($params));
            $table_value = implode("','",$params);
           
            $sql= "insert into $table ($table_columns) values ('$table_value')";
        if($this->mysqli->query($sql)){
            array_push($this->result,$this->mysqli->insert_id);
            return true;
        }
        else{
            array_push($this->result,$this->mysqli->error);
            return false;
        }
        }
   

    }
    public function update($table,$params =array(),$where = null){
        if($this->tableExists($table)){
            $args =array();
            foreach($params as $key=>$value){
                $args[]= "$key='$value'";
            }
            print_r($args);
            $sql = "update $table set " . implode(',', $args);
           if($where != null){
            $sql .= "where $where"; 
           }
           if($this->mysqli->query($sql)){
            array_push($this->result,$this->mysqli->affected_rows  );
            return true;
        }
        else{
            array_push($this->result,$this->mysqli->error);
            return false;  

        }
         
    }
}
        
      

    
    private function tableExists($table){
        $sql = "show tables from $this->db_database LIKE '$table'";
         $tableInDb = $this->mysqli->query($sql);
         if($tableInDb){
            if($tableInDb->num_rows==1){
                return true;
            }
            else{
                array_push($this->result,$table."does not exist in this dataabse");
            }
        }
    }
    
    // public function delete(){
        // if($this->conn){
        //     if($this->mysqli->close()){
        //         $this->conn = false;
        //         return true;

        //     }
        // }
        // else{
        //     array_push($table)
        //     return false;
        // }

//     }

// }
        }
?>