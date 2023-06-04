<?php
$email = ($_REQUEST['email']);
// echo $email;
session_start();


include "database.php";
class updatedata extends database

{
    public $id;
    public function select1($table, $col, $where)
    {
        $select = "select * from $table where `$col`='$where'";
        $res = mysqli_query($this->mysqli, $select);
        $fetch = mysqli_fetch_assoc($res);
        if (isset($fetch['id'])) {
            $this->id = $fetch['id'];
        }
        if (gettype($fetch) != "array") {
            return "data not found";
        } else {
            return $fetch;
        }
        // echo "id is".$id;
        // $_SESSION['lastname'] = $fetch['lastname'];
        // $_SESSION['password'] = $fetch['password'];
    }
    public function update($table, $value, $where)
    {
        // die();
        unset($value['image']);
        unset($value['update']);
        $key = array_keys($value);
        $value = array_values($value);
        // echo $key;
        //  echo "<br>";
        //  print_r($value);
        for ($i = 0; $i < count($key); $i++) {
            $sql = mysqli_query($this->mysqli, "update  `$table` set `$key[$i]` = '$value[$i]' where `email`='$where'");
            if ($sql) {
                echo "<p>data updated</p>";
            } else {
                echo "not updated";
            }
        }
    }
}
$o = new updatedata();
$row = $o->select1('userdata', 'email', $email);
// echo $o->fetch;
if (isset($_REQUEST['update'])) {

    $id = $_REQUEST['email'];
    $o->update('userdata', $_REQUEST, $_REQUEST['email']);
    if (isset($_FILES['image'])) {
        $df = md5(time());
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_image = "images/" . $file_name;
        $default = "uploads/default.jpg.$df";
        // if (!empty($file_name)) {
        // print_r($file_name)
        // die();
        if (move_uploaded_file($file_temp, $file_image)) {
            $fetch = $o->select1('file', 'id', $o->id);
            // $o->update('file', , $_REQUEST['email']);
            // $id = $_SESSION['id'];
            if (gettype($fetch) != "array") {
                $upload = mysqli_query($o->mysqli, "INSERT INTO `file`(`id`,`size`,`extension`,`unique_name`,`name`,`path`) VALUES ('$o->id','$file_size','$file_type','$file_temp','$file_name','$file_image') ");
                header("location:adminpage.php");
            } else {
                $id = $fetch['id'];
                $upload = mysqli_query($o->mysqli, "UPDATE `file` SET `size`='$file_size',`extension`='$file_type',`unique_name`='$file_temp',`name`='$file_name',`path`='$file_image' WHERE `id` = '$id' ");
                header("location:adminpage.php");
            }
        } else {
            die("image not uploaded..");
        }
        // }
    } else {
        die("not uploaded");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        height: 100%;
        padding: 0;
        margin: 0;
        color: white;
        /* background-color: #3b4747; */
        background-color: #c5b8e2;
    }

    main {
        display: flex;
    }

    div {

        padding-left: 300px;
        width: 100%;
    }

    input {
        width: 200px;
        border: none;
        padding: 3px;
        border-radius: 5px;
    }

    h1 {
        padding: 0;
        margin: 0;
        font-size: 60px;

    }

    #signin {
        background: blueviolet;
        border: none;
        border-radius: 5px;
        padding: 6px;
        color: white;
        width: 205px;
    }
</style>

<body>


    <main>
        <img src="https://images.pexels.com/photos/1229861/pexels-photo-1229861.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
        <div>
            <h1>update data</h1>

            <form action="" method="post" enctype="multipart/form-data">
                <label for="firstname">firstname</label>
                <br><br>
                <input type="text" name="firstname" id="" value="<?php echo $row['firstname'] ?>">
                <br><br>
                <label for="lastname">lastname</label>
                <br>
                <input type="text" name="lastname" id="" value="<?php echo $row['lastname'] ?>">
                <br><br>
                <label for="email">email</label>
                <br><br>
                <input type="email" name="email" id="" value="<?php echo $email ?>" required readonly>
                <br><br>
                <label for="password">password</label>
                <br><br>
                <input type="password" name="password" id="" value="<?php echo $row['password'] ?>">
                <br><br>
                <label for="image">image</label>
                <input type="file" name="image" id="">
                <br><br>
                <button type="submit" value="update" name="update" id="signin"> update data </button>

            </form>
        </div>
    </main>

</body>

</html>