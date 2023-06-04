<?php
include "database2.php";
$me = new database2();

if (isset($_REQUEST['submit'])) {
 
    
    $me->insert('user',$_REQUEST);
    


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

<body class="p-10 h-screen bg-no-repeat bg-cover  bg-[url('https://img.freepik.com/premium-vector/luxury-ornamental-mandala-design-background-gold-color-vector_1159-14537.jpg')] ">
     
    <form action="" method="post" class="flex text-white bg-cyan-950 shadow-xl shadow-green-900 w-96 flex-col m-auto p-12 space-y-4 rounded-md   border-green-700">
    <h2 class="h-20 w-20 text-md p-12 flex  justify-center items-center bg-slate-500 font-semibold rounded-full m-auto border-8 border-white">REGISTER</h2>
   
    <div class="flex flex-col w-full  ">
        <label for="email">E-mail</label>
        <input type="email" name="Email" id="" class="rounded-md px-2 text-black">
        </div>
        <div class="flex flex-col w-full ">
        <label for="fname">FIRST NAME</label>
        <input type="text" name="FirstName" id="" class="rounded-md px-2 text-black">
        </div>

      <div class="flex flex-col w-full "> 
      <label for="lname">LAST NAME</label>
        <input type="text" name="LastName" id="" class="rounded-md px-2 text-black">
      </div>

  
      <div class="flex flex-col w-full ">
      <label for="password">PASSWORD</label>
        <input type="password" name="Password" id="" class="rounded-md px-2 text-black">
      </div>
       <div class="flex flex-col w-full ">
       <label for="cpassword">CONFIRM PASSWORD</label>
        <input type="password" name="cpassword" id="" class="rounded-md px-2  text-black">
       </div>

      <!-- <input type="file" name="file" id=""> -->

        <button type="submit" name="submit" value="signin" class="w-full bg-green-400 py-2 rounded-md">SIGN UP</button>
    
 </form>
</body>

</html>