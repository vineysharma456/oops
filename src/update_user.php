<?php
include "database2.php";


$one = new database2();
$res = $one->select2('user', $_REQUEST['id']);

if (gettype($res) != "string") {
    $row = mysqli_fetch_assoc($res);
} else {
    echo $res;
}


?>
<?php  

if (isset($_REQUEST['submit'])) {
    $id = $_REQUEST['id'];

$one->update('user',$_REQUEST,$_REQUEST['id']);
if (isset($_FILES['image'])) {
    $df = md5(time());
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_image = "upload/" . $file_name;
    $default = "uploads/default.jpg.$df";
    // if (!empty($file_name)) {
    // print_r($file_name)
    // die();
    if (move_uploaded_file($file_temp, $file_image)) {
        $row = $one->select('file', 'id');
        // $o->update('file', , $_REQUEST['email']);
        // $id = $_SESSION['id'];
        if (gettype($row) != "array") {
            $upload = mysqli_query($one->mysqli, "INSERT INTO `file`(`id`,`filesize`,`Extension`,`unique_name`,`name`,`path`) VALUES ('$id','$file_size','$file_type','$file_temp','$file_name','$file_image') ");
            // header("location:adminpage.php");
            echo "inserted";
        } else { 
            $id = $row['id'];
            $upload2 = mysqli_query($one->mysqli, "UPDATE `file` SET `filesize`='$file_size',`Extension`='$file_type',`unique_name`='$file_temp',`name`='$file_name',`path`='$file_image' WHERE `id` = '$id' ");
            // header("location:adminpage.php");
            echo "update";
        }
    } else {
        die("image not uploaded..");
    }
    // }
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

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="id">ID</label>
        <input type="text" name="id" id="" value="<?php echo $row['id']; ?>">

        <label for="Email">EMAIL</label>
        <input type="email" name="Email" id="" value="<?php echo $row['Email'];  ?>" >
        <label for="FirstName">FirstName</label>
        <input type="text" name="FirstName" id="" value="<?php echo $row['FirstName']; ?>">
        <label for="LastName">LastName</label>
        <input type="text" name="LastName" id="" value="<?php echo $row['LastName']; ?>">
        <label for="password">Password</label>
        <input type="text" name="Password" id="" value="<?php echo $row['Password']; ?>">
        <input type="file" name="image" id="">

        <button name="submit">Update</button>

    </form>
</body>

</html>