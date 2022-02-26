<?php

 session_start();
 include("connect.php");
 include("function.php");
 $user_data = check_login($con);



// if(isset($_SESSION['user_id'])){
     
//     echo "you are logged in";

// }else{
//     echo "hi";
// }

// if(isset($_SESSION['user_name'])){
     
//     echo "you are logged in";

// }else{
//     echo "not logged in";
// }




// // this will initialize a function //
$user_data = new Clients();

// // calling a function viewData 
$data = $user_data->viewData();
 
echo var_dump($data);

//function will be triggered once the submit button is clicked//
if(isset(($_POST["submit"]))){
    $user_data -> add();
}

if (isset($_GET['del_id']) && !empty($_GET['del_id'])) {

         $delId = $_GET['del_id'];
         $user_data -> deleteStudent($delId);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PHP CRM</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<style>
    .form-control{
        width: 50% !important;
    }

 
</style>

</head>
<body>
    <div class="container">
        <header>
            <h2>CRM Contact Information</h2>
           
        </header>

       <p style="display:inline">
       <?php if(isset($_SESSION['user_name'])){ ?>
        You are logged in / 
       

     
    <?php
 
 }
 ?>
       </p><a href="logout.php"> Logout </a>
         
        <main>

            <div class="section">
                <h1>Contact information list </h1>
                <form action="index.php"  enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="business_name" >Business name</label>
                        <input type="text" class="form-control" name="business_name" id="business_name" placeholder="Enter your business name">
                    </div> 

                    <div class="form-group">
                        <label for="contact_name">Full Name</label>
                        <input type="text" class="form-control" name="contact_name" id="contact_name" placeholder="Enter your name">
                    </div>  
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your phone number">
                    </div>

                    <div class="form-group">
                        <label for="enquiry">Enquiry</label>
                        <input type="text" class="form-control" name="enquiry" id="enquiry" placeholder="Enter message here">
                    </div>

                    <div class="form-group">
                        <label for="products">Products</label>
                        <input type="text" class="form-control" name="products" id="products" placeholder="Enter products here">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="upfile" id="upfile" accept="..png,.git,.jpeg,.jpg" required>
                    </div>


                  
                    <input type="submit" style="margin:20px;" name="submit" value="Add New Record" class="btn btn-success">
            
                </form>
        
        <table class="table table-success table-striped">

            <thead>
                <tr>
                    <th scople="col">Business name </th>
                    <th scope="col"> Full Name </th>
                    <th scope="col"> Email </th>
                    <th scope="col"> Phone</th>
                    <th scope="col"> Enquiry</th>
                    <th scope="col"> Products</th>
                    <th scope="col">Image</th>
                   
                    <?php if(!is_null($data)){?> <th scope="col"></th>

                    <?php } ?>
                    
                  

                </tr>
            </thead>
            <tbody>

            <?php

                if(is_null($data)){

                    ?>
                    <tr>               
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Data</td>
                   
                  

                </tr><?php
                } else{

                foreach($data as $a){
                    // after as, it can be any name. Just need to assign a name for each element//
                    // data is the name of the array // 
                    ?>
                        <tr>
                          
                            <td><?php echo $a['business_name'] ?>
                            </td>
                            <td><?php echo $a['contact_name'] ?>
                            </td>
                            <td><?php echo $a['email'] ?>
                            </td>
                            <td><?php echo $a['phone'] ?>
                            </td>
                            <td><?php echo $a['enquiry'] ?>
                            </td>
                            <td><?php echo $a['products'] ?>
                            </td>
                            <td><?php echo " <img width='100' src= $a[images] />"  ?>
                            </td>
                            
                            <td>
                                <a href="update.php?edit_id=<?php echo $a['ID']; ?>">
                                    <i class="fas fa-edit"> </i></a>

                                <a href="index.php?del_id=<?php echo $a['ID']; ?>">
                                    <i class="fas fa-trash"></i></a>
                            </td>

                        </tr>
                <?php
                }
            }
                ?>
                </tbody>

            </table>

             

        </main>     
    </div>