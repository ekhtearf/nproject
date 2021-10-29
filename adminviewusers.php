<?php

$conn = new mysqli("localhost", "root", "", "nproject");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<Center><h3>All Users in your database</h3></center";
$sql = "SELECT id, user_type , username, name , number, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<Center><table border><tr>
        <th> ID</th>
        <th>User Type</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        </tr>";
    while($row = $result->fetch_assoc()) {
    echo "<tr>
        <th>".$row["id"]."</th>
        <td>".$row["user_type"]."</td>
        <td>".$row["username"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["number"]."</td>
        <td>".$row["email"]."</td>
        </tr>
        ";
    }
    echo "</center></table>";
} else {
    echo "0 results";
}

$conn->close();

?>

