<?php
include"database2.php";


$o = new database2();
if(isset($_POST['submit'])){
    // $where = $_REQUEST['Email'];
    $o->signin('user',$_REQUEST,$_REQUEST['Email']);

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

<body class="h-screen text-center bg-no-repeat bg-cover  bg-[url('https://img.freepik.com/premium-vector/luxury-ornamental-mandala-design-background-gold-color-vector_1159-14537.jpg')] p-22 ">
 

<form action="" method="post" class=" m-auto flex flex-col  w-96 bg-white p-12 rounded-2xl gap-10 text-black">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYE78lzXWS9HYNKi2h-iMLFpcASV2CHhqWqspfYWGPrmClDJi8iCdUYtao5lgZy50VeEM&usqp=CAU" alt="" class="h-32 w-32 mx-auto rounded-full">
  <div class="px-10"> 
    <span class="text-blue-500 text-2xl font-bold">LOGIN NOW</span>
  </div>
    
    <div class=" ">
        <label for="Email">Username*</label>
    <input type="email" name="Email" id="" class="rounded-2xl px-2 py-1 bg-slate-200">
        </div>
     <div class=" ">
     <label for="Password">Password*</label>
    <input type="password" name="Password" id=""  class="rounded-2xl px-2 py-1 bg-slate-200">
     </div> 
   <div class="flex flex-col  gap-6">
     <button type="submit" name="submit" class="text-white bg-blue-600 rounded-full p-3">LOGIN</button>
     <a href="signup.php">Dont have an account?</a>
     </div>
</form>
</body>
</html>