<?php
$server = "localhost";
$user ="root";
$pass = "";
$db = "oops";
$conn =  new mysqli($server,$user,$pass,$db);
if($conn->connect_error){
    die("connection failed : ".$conn->connect_error);
}

$sql = "select * from `student` ";
$result = $conn->query($sql);
if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){
        echo "ID:{$row["id"]} - Name :{$row["student_name"]} - Age :{$row["age"]} \n";
        echo"<br>"; 
    }
}
else{
    echo "No result found";
}


$conn->close();
?>