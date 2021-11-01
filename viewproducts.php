<?php

$conn = new mysqli("localhost", "root", "", "nproject");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<fieldset><legend ALIGN=center><h1>All products in Shobkichu</h1></legend>";

$sql = "SELECT id, pid , pname, price , info FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table  ALIGN=center>
    <tr>
    <th ALIGN=center>Product ID</th>
    <th ALIGN=center>Product Name</th>
    <th ALIGN=center>Retailer ID</th>
    <th ALIGN=center>Product Info</th>
    <th ALIGN=center>Product Price</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>
        <th ALIGN=center>".$row["pid"]."</th>
        <td ALIGN=center>".$row["pname"]."</td>
        <td ALIGN=center>".$row["id"]."</td>
        <td ALIGN=center>".$row["info"]."</td>
        <td ALIGN=center>".$row["price"]."</td>
        </tr>
        ";
    }
    echo "</center></table>";
} else {
    echo "0 results";
}
echo "</fieldset>";
$conn->close();

?>