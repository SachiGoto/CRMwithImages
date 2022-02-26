<?php

include("connect.php");
include("function.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    echo "<h1> from POST FORM </h1>";
   $user_name = $_POST["user_name"];
   $password = $_POST["password"];
   $name = $_POST["name"];
   $email = $_POST["email"];
   $phone = $_POST["phone"];
   $address = $_POST["address"];


//    echo "admin " .$name . " password " . $password;

   // use name that is assigned in each input field 

   if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
   if(!empty($user_name) && !empty($password && !is_numeric($user_name))){
  
       $query = "INSERT INTO `user_info`(`user_name`, `password`, `name`, `email`, `phone`, `address`) VALUES ('$user_name','$password','$name','$email','$phone','$address')"; 

   

       if ($con->query($query) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $query . "<br>" . $con->error;
      }

       header("Location:login.php");

   }else{
       echo "Please enter usename and password";
   };

};





?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to sing-up page</title>
    <style>
        .text{

             height: 25px;
             border-radius: 5px;
             padding: 4px;
             border: solid thin #aaa;
             width: 100%;
             margin-bottom:20px;
             }
             
        .button{
             
             padding: 10px; 
             width: 100px;
             color: white;
             background-color: lightblue;
             border: none; 
             margin-bottom:10px;
             }
             
        .box{
             
             background-color: grey;
             margin: auto;
             width: 300px;
             padding: 20px;
             } 

</style>
</head>
<body>

        <div class="box">
   
        <form method="post">
            <div style="font-size:20px; margin:20px; color:white;">Sign Up</div>
            <input type="text" class="text" name="user_name" placeholder="enter user name"><br> 
            <input type="password" class="text" name="password" placeholder="enter password"><br> 
            <input type="text" class="text" name="name" placeholder="enter your full name"><br> 
            <input type="text" class="text" name="email" placeholder="enter your email"><br> 
            <input type="text" class="text" name="phone" placeholder="enter your phone number"><br>
            <input type="text" class="text" name="address" placeholder="enter your address"><br> 
            <input type="submit" class="button" name="button" value="Signup"><br> 

        </form>

        <a href="login.php">Click here to log in</a>





        </div>
    
</body>
</html>