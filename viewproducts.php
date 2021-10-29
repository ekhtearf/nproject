<?php

$conn = new mysqli("localhost", "root", "", "nproject");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<Center><h3>All products in your website</h3></center>";

$sql = "SELECT id, pid , pname, price , info FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<Center><table border>
    <tr>
    <th>Product ID</th>
    <th>Product Name</th>
    <th>Product Info</th>
    <th>Product Price</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>
        <th>".$row["pid"]."</th>
        <td>".$row["pname"]."</td>
        <td>".$row["info"]."</td>
        <td>".$row["price"]."</td>
        </tr>
        ";
    }
    echo "</center></table>";
} else {
    echo "0 results";
}

$conn->close();

?>