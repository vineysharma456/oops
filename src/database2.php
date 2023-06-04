<?php
session_start();
class database2
{
    public $db_host =  "localhost";
    public $db_user =  "root";
    public $db_pass = "";
    public $mysqli = "";
    public $conn = false;
    public $result = array();
    public $db_database = "oops";
//    file upload manager
// public $filename ;
// public $tfilename ;
// public $size ;
// public $type ;
// public$destination = "images/". $filename;
// public $path ;


    public function __construct()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_database);
            $this->conn = true;
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);

                echo "No conncetion";
            } else {
                return true;
            }
        }
    }
    // public function add($table,$file){
    //     $file_name = $file['photo']['name'];
    //     $file_size = $file['photo']['size'];
    //     $file_temp = $file['photo']['tmp_name'];
    //     $upload_image = "upload/".$file_name;
    //     // $key = implode("`,`", array_keys($value));
    //     // $value = implode("','", array_values($value));
    //     move_uploaded_file($file_temp, $upload_image);
    //     // $query = "INSERT INTO `$table`(`name`, `email`, `phone`, `photo`, `address`) VALUES ('$name', '$email', '$phone', '$upload_image', '$address')";
    //     // unset($value['submit']);
    //     $sql = mysqli_query($this->mysqli, "insert into `$table` (`$key`) values ('$value')");
    //         if ($sql) {
              
    //             header("location: signup.php");
    //         }
    //      else {
    //         echo "password  not matched";
    //     }

    // }



    public function insert($table, $value)
    {
        unset($value['submit']);
        if ($value['cpassword'] == $value['Password']) {

            unset($value['cpassword']);
            $key = implode("`,`", array_keys($value));
            $value = implode("','", array_values($value));
           

            $sql = mysqli_query($this->mysqli, "insert into `$table` (`$key`) values ('$value')");
            if ($sql) {
              
                header("location: signup.php");
            }
        } else {
            echo "password  not matched";
        }
    }


    public function signin($table, $value, $where)
    {
        unset($value['submit']);


        $sql = mysqli_query($this->mysqli, "select * from `$table` where `Email`='$where'");
        if ($sql->num_rows > 0) {
            $fetch = $sql->fetch_assoc();

            if ($fetch['Email'] == $value['Email'] && $fetch['Password'] == $value['Password']) {
                header("location: userindex.php");
            }
        } else {
            echo "NOT CORRECT";
        }
    }





    public function select($table)
    {
        // $array = array();
        // $query = ;
        $result = mysqli_query($this->mysqli, "select * from `$table`");
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    public function select2($table,$where){
        $result = mysqli_query($this->mysqli, "select * from `$table` where `id`='$where'");
     
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }else{
            return "data not found";
        }

    }
   public function update($table,$value,$where){
    unset($value['submit']);
   
    foreach($value as $key=>$val){
        $sql = mysqli_query($this->mysqli, "update `$table` set `$key` = '$val' where `id`='$where'");
    }
    if($sql){
        echo "data update";
    }
    
   

   }
   public function image($table,$id){
    $result2= mysqli_query($this->mysqli,"SELECT  `path` FROM `$table` WHERE `id` ='$id'");
    if(mysqli_num_rows($result2)>0){
        return $result2;
    }

   }
  
   

   public function delete($table,$where){
    // unset($value['delete']);s
    $sql = mysqli_query($this->mysqli, "delete from `$table`  where `id`='$where'");
 
     if($sql){
        return "deleted";
        header('location:userindex.php');
     }
     else{
        return "error";
     }


  
    }
   
 
          
        
// public function img($table,$file_name){
//     $file_name = $file['file']['name'];
//     $file_size = $file['']['size'];
//     $file_temp = $file['photo']['tmp_name'];

//}
}
    
   

?>