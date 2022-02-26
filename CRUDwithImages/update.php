
<?php




include("function.php");


$updateClient = new Clients();


if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){


    // $filename = $_FILES['upfile']['name'];
    // $tempname = $_FILES['upfile']['tmp_name'];
    // $folder = "img/" . $filename;
    
  
  

    //  $business_name = $_POST['business_name'];
    //  $contact_name = $_POST['contact_name'];
    //  $email = $_POST['email'];
    //  $phone = (int)$_POST['phone'];
    //  $enquiry = $_POST['enquiry'];
    //  $products = $_POST['products'];

    $editId = $_GET['edit_id'];


    $clientInformation = $updateClient -> getRecordById($editId);

    // if(move_uploaded_file($tempname, $folder)){
    //     echo "success";
    //   }else{
    //     echo "fail";
    //   }

    echo "edit id is " . $_GET['edit_id'];
    // echo var_dump($clientInformation);

}else{

    echo " we do not have edit id";
};


if (isset(($_POST['update']))){
    

     $data = $updateClient -> updateClient($_POST);

}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <style>
        #imageContainer{
            height:100px;
            width:100px;
           
            
        }

        #imageContainer img{
           width:100%;
        }
    </style>
</head>
<body>


<div class="container">
        <header>
            <h2>CRM</h2>
        </header>
         
        <main>

            <div class="section">
                <h1>Update contact informtaion</h1>
                
                <form action="update.php" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="business_name" >Business name</label>
                        <input type="text" class="form-control" name="business_name" id="business_name" value= "<?php echo $clientInformation['business_name']; ?>" placeholder="Enter your business name">
                    </div> 

                    <div class="form-group">
                        <label for="contact_name">Full Name</label>
                        <input type="text" class="form-control" name="contact_name" id="contact_name" value= "<?php echo $clientInformation['contact_name']; ?>" placeholder="Enter your name">
                    </div>  
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value= "<?php echo $clientInformation['email']; ?>" placeholder="Enter your email">
                    </div>

                    <div class="form-group">
                        <label for="phone">Address</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your phone number" value= "<?php echo $clientInformation['phone']; ?>" >
                    </div>

                    <div class="form-group">
                        <label for="enquiry">Enquiry</label>
                        <input type="text" class="form-control" name="enquiry" id="enquiry" placeholder="Enter message" value= "<?php echo $clientInformation['enquiry']; ?>" >
                    </div>

                    <div class="form-group">
                        <label for="products">Products</label>
                        <input type="text" class="form-control" name="products" id="products" placeholder="Enter products" value= "<?php echo $clientInformation['products']; ?>" >
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <div> <img width="150" src='<?php echo $clientInformation['images']; ?>'> </div>
                      
                    </div> 
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="upfile" id="upfile" accept="..png,.git,.jpeg,.jpg">
                    </div>


                    <input type="hidden" name="id" value = "<?php echo $clientInformation['ID']; ?> ">

                  
                    <input type="submit" style="margin:20px;" name="update" value="Update Information" class="btn btn-primary">

                    <!-- <i class="fas fa-file"></i> -->
            
                </form>
        
        

                


</div>
    
</body>
</html>