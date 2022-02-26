
     
<?php

function check_login($con){

// if(isset($_SESSION['user_id'])){
    if(isset($_SESSION['user_name'])){

        $user_name = $_SESSION['user_name'];
       
        $query = "select * from users where user_id = '$user_name' limit 1";
    
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0){
            
            
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
            
    
    }else{
    
    header("Location:login.php");
    die;
    
    } };


class Clients{

    private $host = "localhost:8889";
    private $username = "root";
    private $password = "root";
    private $dbname = "CRM";

    public $client_conn;
   
    // constructor is a function // 
    function __construct(){


       $this -> client_conn = new mysqli($this -> host, $this->username, $this->password, $this->dbname); 

  if(mysqli_connect_error()){
      trigger_error("Error is in DB ". mysqli_connect_error());
  }{
      return $this->client_conn;
  };

    }

    public function viewData(){
             $sql = " SELECT ID, business_name, contact_name, email, phone, enquiry, products, images FROM contact_info";
             // This is returning a value so I need to create a variable so that I can access it. 
             $result = $this->client_conn->query($sql);

             if($result->num_rows >0){
             // checking is there is any data inside. 
             // converting data into an array

                   $data = array();
                   while($row = $result->fetch_assoc()){
                       $data[] = $row;
                       
                       // assign each row 
                   }
                
                   return $data;
             }
         }


    public function add(){

    if(isset($_POST['submit'])){

      // $filename = $_FILES['upfile']['name'];
      // $tempname = $_FILES['upfile']['tmp_name'];
      // $folder = "img/" . $filename;
      
      $filename = $_FILES['upfile']['name'];
      $tempname = $_FILES['upfile']['tmp_name'];
      $folder = "img/" . $filename;
    

       $business_name = $_POST['business_name'];
       $contact_name = $_POST['contact_name'];
       $email = $_POST['email'];
       $phone = (int)$_POST['phone'];
       $enquiry = $_POST['enquiry'];
       $products = $_POST['products'];
      //  $image = basename($_FILES['upfile']['name']);
     
    };
       
    //    inserting data
       $sql = "INSERT INTO contact_info(business_name, contact_name, email, phone, enquiry, products, images) VALUES ('$business_name','$contact_name','$email','$phone', '$enquiry' , '$products', '$folder')" ;
      
       if(move_uploaded_file($tempname, $folder)){
         echo "success";
       }else{
         echo "fail";
       }

      if ($this->client_conn->query($sql)) {
        // echo "New record created successfully";
        header("Location: index.php");
      } else {
        echo "Error:" . $this->client_conn->error;
      }
    }

 
    public function deleteStudent($id){
       
       $sql = "DELETE FROM contact_info WHERE ID = '$id' ";
       $result = $this->client_conn->query($sql);
       if($result){
           
        //    echo " the student record has been deleted";
           header("Location:index.php");
       }
    //    else{
           
    //        echo " not able to delete ";
    //    }
    }

    public function getRecordById($id){
        $sql = "SELECT * FROM `contact_info` WHERE `ID` = $id ";
        // This is returning a value so I need to create a variable so that I can access it. 
        $result = $this->client_conn->query($sql);

        if($result->num_rows >0){
        // checking is there is any data inside. 
        // converting data into an array
   
             
              $row = $result -> fetch_assoc();
            //   save the result in row
              return $row;
            
            echo var_dump($row);
              $data = array();
           

              while($row = $result->fetch_assoc()){
                  $data[] = $row;
                  // assign each row 
              }

              echo var_dump($data);

              return $data;


        }
        // else{
        //     echo "No records found";
        // }
  
}


  public function updateClient($postData){


       $business_name = $_POST['business_name'];
       $contact_name = $_POST['contact_name'];
       $email = $_POST['email'];
       $phone= $_POST['phone'];
       $enquiry= $_POST['enquiry'];
       $products= $_POST['products'];
       $id = $_POST['id'];

      $filename = $_FILES['upfile']['name'];
      $tempname = $_FILES['upfile']['tmp_name'];
      $folder = "img/" . $filename;

       
      if(move_uploaded_file($tempname, $folder)){
        echo "success";
      }else{
        echo "fail";
      }

       if(!empty($id) && !empty($postData)){


        $sql = "UPDATE contact_info SET business_name='$business_name', contact_name ='$contact_name', email='$email', phone='$phone',  enquiry='$enquiry', products = '$products', images='$folder', ID='$id' WHERE ID='$id'";

  // echo $products;
  // echo $enquiry;
          
        $result = $this->client_conn->query($sql);
    
           if($sql == true){
               header("Location:index.php");
            echo "It is connected";
           }
           
           else{
               echo "update failed ";
           }
       }
  
     
    }



   
 







}


?>





