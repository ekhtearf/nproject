<?php
    session_start();

    if(!isset($_SESSION['username']) || $_SESSION['role']!="admin"){
        header("location:index.php");
    }
?>


<!DOCTYPE html>
<html>
<body>

<fieldset>
    <legend align="center"><h1>Hello <?= $_SESSION['username']?></h1></legend>
<table align="center">
<tr>
<th colspan="2" align="center"><img src="admin.png"></th>
</tr>
<tr>
<th colspan="2" align="center"><h2>You have logged in as an <?= $_SESSION['role']?></h2><hr></th>
</tr>
<tr>
<th align="center">View all users by clicking here-</th>
<td align="center"><button><a href="adminviewusers.php">USERS</a></button></td>
</tr>
<tr>
<th align="center">Add an user by clicking here-</th>
<td align="center"><button><a href="adduser.html">Add User</a></button></td>
</tr>
<tr>
<th align="center">View all products by clicking here-</th>
<td align="center"><button><a href="viewproducts.php">PRODUCTS</a></button></td>
</tr>
<tr>
<th align="center">Add a product by clicking here-</th>
<td align="center"><button><a href="addproduct.html">Add Product</a></button></td>
</tr>
</table>

<br>
<br>
<center><h4>
<label for="logout"> If you want to logout click here-</label>
<button><a href="logout.php" value="logout">LOGOUT</a></button></h4></center>
</fieldset>
</body>
</html>


