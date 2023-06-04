<?php
include"database.php";
$obj = new database();
// $obj->insert('student',['student_name'=>'Ram Kumar','age'=>'20','city'=>'Goa']);
// $obj->insert('student',['student_name'=>'Shyam Kumar','age'=>'22','city'=>'Agra']);
// $obj->insert('student',['student_name'=>'Sajay Kumar','age'=>'22','city'=>'Agra']);
// $obj->insert('student',['student_name'=>'AKshay Kumar','age'=>'22','city'=>'Agra']);
$obj->update('student',['student_name'=>'Krishan Kumar','age'=>'20','city'=>'Agra'],'student_name="Ram Kumar"');
echo"Update result is: ";
// print_r($obj->getResult());
?>
