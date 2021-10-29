<?php

$conn = mysqli_connect("localhost", "root", "", "nproject");
  
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}
  
// Taking all 4 values from the form data(signup)
$id = $_POST['id'];
$pname =  $_POST['pname'];
$price = $_POST["price"];
$info =  $_POST['info'];  
// Performing insert query execution
// here our table name is products
$sql = "INSERT INTO `products` ( `id`, `pname`, `info`, `price` ) VALUES ('$id','$pname','$price','$info')";
  
if(mysqli_query($conn, $sql)){
    echo "<h3>Product data stored in a database successfully." 
        . " Please browse your localhost php my admin" 
        . " to view the updated product data</h3>"; 

    echo "You have added a product named- \n$pname- for the ID-\n$id<br>The price of the product is\n$price\nTK.<br>All the product information are-\n$info";
} 
else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($conn);
}

?>
