<?php
    session_start();

    if(!isset($_SESSION['username']) || $_SESSION['role']!="admin"){
        header("location:index.php");
    }
?>


<!DOCTYPE html>
<html>
<body>


<table align="center">
<tr>
<th colspan="2"><img src="admin.png"></th>
</tr>
<tr>
<th colspan="2"><h1>Hello <?= $_SESSION['username']?></h1></th>
</tr>
<tr>
<th colspan="2"><h1>You have logged in as an <?= $_SESSION['role']?></h1></th>
</tr>
<tr>
<th>View all users by clicking here-</th>
<td><button><a href="adminviewusers.php">USERS</a></button></td>
</tr>
<tr>
<th>Add an user by clicking here-</th>
<td><button><a href="adduser.html">Add User</a></button></td>
</tr>
<tr>
<th>View all products by clicking here-</th>
<td><button><a href="viewproducts.php">PRODUCTS</a></button></td>
</tr>
<tr>
<th>Add a product by clicking here-</th>
<td><button><a href="addproduct.html">Add Product</a></button></td>
</tr>
</table>

<br>
<br>
<center><h4>
<label for="logout"> If you want to logout click here-</label>
<button><a href="logout.php" value="logout">LOGOUT</a></button></h4></center>
</body>
</html>


