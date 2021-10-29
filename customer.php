<?php
    session_start();

    if(!isset($_SESSION['username']) || $_SESSION['role']!="customer"){
        header("location:index.php");
    }


?>
<img src="customer.png" alt="">

<h1>Hello <?= $_SESSION['username']?></h1>
<h1>You have logged in as a <?= $_SESSION['role']?></h1>

<!DOCTYPE html>
<html>
<body>
<?php

$conn = new mysqli("localhost", "root", "", "nproject");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



echo "<h3>Products you can buy</h3>";

$sql = "SELECT id, pid , pname, price , info FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<table border>
        <thead>
        <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Info</th>
        <th>Product Price</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <th>".$row["pid"]."</th>
        <td>".$row["pname"]."</td>
        <td>".$row["info"]."</td>
        <td>".$row["price"]."</td>
        </tr>
        </tbody>
        </table>
        ";
    }
} else {
    echo "0 results";
}




echo "<br> <h3>Contact the seller if you want to buy anything.</h3>";
$sql = "SELECT * FROM `nproject`.`users` WHERE (CONVERT(`id` USING utf8) LIKE '%retailer%' OR CONVERT(`user_type` USING utf8) LIKE '%retailer%' OR CONVERT(`username` USING utf8) LIKE '%retailer%' OR CONVERT(`password` USING utf8) LIKE '%retailer%' OR CONVERT(`name` USING utf8) LIKE '%retailer%' OR CONVERT(`number` USING utf8) LIKE '%retailer%' OR CONVERT(`email` USING utf8) LIKE '%retailer%') ORDER BY `username` ASC
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Retailer's Number: ". $row["number"]."<br>"."Retailer's Email: ". $row["email"]."<br>";
    }
} else {
    echo "0 results";
}

echo "<br> <h3>Did you face any issue ? Contact an admin.</h3>";
$sql = "SELECT * FROM `nproject`.`users` WHERE (CONVERT(`id` USING utf8) LIKE '%admin%' OR CONVERT(`user_type` USING utf8) LIKE '%admin%' OR CONVERT(`username` USING utf8) LIKE '%admin%' OR CONVERT(`password` USING utf8) LIKE '%admin%' OR CONVERT(`name` USING utf8) LIKE '%admin%' OR CONVERT(`number` USING utf8) LIKE '%admin%' OR CONVERT(`email` USING utf8) LIKE '%admin%') ORDER BY `username` ASC
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Admin Number: ". $row["number"]."<br>"."Admin Email: ". $row["email"]."<br>";
    }
} else {
    echo "0 results";
}

$conn->close();

?>
<br>
</body>
</html>


<button><a href="logout.php">LOGOUT</a></s></button>