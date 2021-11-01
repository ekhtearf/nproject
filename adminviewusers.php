<?php

$conn = new mysqli("localhost", "root", "", "nproject");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<fieldset><legend ALIGN=center><h1>All Users in your database</h1></legend>";
$sql = "SELECT id, user_type , username, name , number, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table ALIGN=center><tr>
        <th ALIGN=center> ID</th>
        <th ALIGN=center>User Type</th>
        <th ALIGN=center>Username</th>
        <th ALIGN=center>Full Name</th>
        <th ALIGN=center>Phone Number</th>
        <th ALIGN=center>Email</th>
        </tr>";
    while($row = $result->fetch_assoc()) {
    echo "<tr>
        <th ALIGN=center>".$row["id"]."</th>
        <td ALIGN=center>".$row["user_type"]."</td>
        <td ALIGN=center>".$row["username"]."</td>
        <td ALIGN=center>".$row["name"]."</td>
        <td ALIGN=center>".$row["number"]."</td>
        <td ALIGN=center>".$row["email"]."</td>
        </tr>
        ";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "</fieldset>";
$conn->close();

?>

