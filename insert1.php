<?php

$conn = mysqli_connect("localhost", "root", "", "nproject");
  
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}
  
// Taking all 6 values from the form data(signup)
$user_type = $_POST['user_type'];
$username =  $_POST['username'];
$password = $_POST["password"];
$name =  $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];

  
// Performing insert query execution
// here our table name is users
$sql = "INSERT INTO `users` (  `username`, `password`, `name`, `number`, `email`,`user_type`) VALUES ('$username','$password','$name','$number','$email','$user_type')";
  
if(mysqli_query($conn, $sql)){
    echo "<h3>User information stored in database successfully." 
        . " Please browse your localhost php my admin" 
        . " to view the updated data</h3>"; 

    echo "You have added a user as  \n$user_type.<br>Their username is $username.<br>Their phone number is-\n$number\nand email id is-\n$email <br>";
} 
else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($conn);
}




?>