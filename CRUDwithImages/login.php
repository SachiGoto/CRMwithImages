<?php


session_start();
        
include("connect.php");
include("function.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];


    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
      
        //read from database
        $query = "select * from user_info where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);
        
        if($result)
        {   
           

            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
            
                if($user_data['password'] === $password)
                {
                    $_SESSION['password'] = $user_data['password'];
                    $_SESSION['user_name'] = $user_data['user_name'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        
        echo "wrong username or password!";
    }else
    {
        echo "wrong username or password!";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in page</title>
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
             margin-bottom:20px;
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
            <div style="font-size:20px; margin:20px; color:white;">Login</div>
            <input type="text" class="text" name="user_name" placeholder="enter use name"><br> 
            <input type="password" class="text" name="password" placeholder="enter password"><br> 
            <input type="submit" class="button" name="button" value="Login"><br> 

        </form>

        <a href="signup.php">Click here to Sign up</a>





        </div>
    
</body>
</html>
    
</body>
</html>