<?php
    session_start();

    if(!isset($_SESSION['username']) || $_SESSION['role']!="retailer"){
        header("location:index.php");
    }
    
?>

<!DOCTYPE html>
<html>
<body>
<fieldset>
    <legend ALIGN="center"><h1>Hello <?= $_SESSION['username']?></h1></legend>
<table align="center">
<tr>
<th align="center" colspan="2"><img src="retailer.png"></th>
</tr>
<tr>
<th colspan="2"><h1>You have logged in as a <?= $_SESSION['role']?></h1><hr></th>
</tr>
<tr>
<th>View all products by clicking here-</th>
<td><button><a href="viewproducts.php">PRODUCTS</a></button></td>
</tr>
<tr>
<th>Add a product by clicking here-</th>
<td><button><a href="addproduct.html">Add Product</a></button></td>
</tr>
<tr>
<th>Did you Face any Issue? Get admin contact info</td>
<td><button><a href="contactadmin.php">Contact Admin</a></button></td>   
</tr>
<tr>
    <td>
        <br>
    </td>
</tr>
<tr>
    <td align="center" colspan="2"><button><a href="logout.php">LOGOUT</a></button></td>
</tr>
</table>
</fieldset>
</body>
</html>


