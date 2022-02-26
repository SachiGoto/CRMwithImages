<?php

$dbhost="localhost:8889";

$dbuser = "root";
$dbpass="root";
$dbname="CRM";


if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
    // functions take arguments //
    die(" failed to connect to database" .mysqli_connect_error());
  
}
// else{
//     echo "data base is connected " ;
// };







?>