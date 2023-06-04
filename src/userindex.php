<?php
include "database2.php";
$ko = new database2();
$res = $ko->select('user');




?>

<?php
if (isset($_REQUEST['uid'])) {
    $ko->delete('user', $_REQUEST['uid']);
    header('location: userindex.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>

<body class ="bg-no-repeat bg-cover  bg-[url('https://img.freepik.com/free-vector/abstract-blue-royal-mandala-background_1055-2981.jpg?size=626&ext=jpg&uid=R92589748&ga=GA1.1.1717262889.1676228095&semt=ais')] text-white text-center h-screen p-12">
    <a href="signup.php" class="px-4 py-2  bg-green-700 rounded-full">ADD USERS </a>
    <table class="w-72 m-auto p-6 bg-white text-black " >
        <thead class="bg-black text-white px-8 " cellspacing ="20px" >
            <th>
                ID
            </th>
            <th>
                Email
            </th>
            <th> 
            Password
            </th>
            <th>
            FisrtName
            </th>
            <th>
              LastName
            </th>
            <th>
                EDIT
            </th>
            <th>
                DELETE
            </th>
           <th>
               IMAGE
           </th>
        </thead>
        <?php
        if ($res != null) {
            while ($row = mysqli_fetch_assoc($res)) {
        ?>
                <tbody>
                    <tr class="bg-slate-300">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Password']; ?></td>
                        <td><?php echo $row['FirstName']; ?></td>
                        <td><?php echo $row['LastName']; ?></td>
                        <td><a href="update_user.php?id=<?php echo $row['id']; ?>">EDIT</a></td>
                        <td><a href="userindex.php?uid=<?php echo $row['id']; ?>">Delete</a></td>



                        <td><a href="userindex.php?uid=<?php echo $row['id']; ?>">IMAGE</a></td>
                   
                                    
                   
                       



                    </tr>
            <?php
            }
        }
            ?>
                </tbody>
    </table>
</body>

</html>