<?php
    session_start();

    if(!isset($_SESSION['username']) || $_SESSION['role']!="retailer"){
        header("location:index.php");
    }
    
?>




<!DOCTYPE html>
<html>
<body>

<table align="center" border>
<tr>
<th colspan="2"><img src="retailer.png"></th>
</tr>
<tr>
<th colspan="2"><h1>Hello <?= $_SESSION['username']?></h1></th>
</tr>
<tr>
<th colspan="2"><h1>You have logged in as a<?= $_SESSION['role']?></h1></th>
</tr>
<tr>
<th>View all products by clicking here-</th>
<td><button><a href="viewproducts.php">PRODUCTS</a></button></td>
</tr>
<tr>
<th>Add a product by clicking here-</th>
<td><button><a href="addproduct.html">Add Product</a></button></td>
</tr>
<tr colspan="2">
<th>Did you Face any Issue? Contact an admin.</th>    
</tr>
<tr>
    <td>Admin Email</td>
    </tr>
<tr>
    <td>Admin number</td>    
</tr>
</table>

<?php
$conn = new mysqli("localhost", "root", "", "nproject");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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


<button><a href="logout.php">LOGOUT</a></button>