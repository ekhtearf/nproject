<?php
$conn = new mysqli("localhost", "root", "", "nproject");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


echo "<fieldset><legend ALIGN=center><h1>Contact Admin</h1></legend>";
echo "<h3 ALIGN=center>Contact an admin through his email or phone number</h3>";
$sql = "SELECT * FROM `nproject`.`users` WHERE (CONVERT(`id` USING utf8) LIKE '%admin%' OR CONVERT(`user_type` USING utf8) LIKE '%admin%' OR CONVERT(`username` USING utf8) LIKE '%admin%' OR CONVERT(`password` USING utf8) LIKE '%admin%' OR CONVERT(`name` USING utf8) LIKE '%admin%' OR CONVERT(`number` USING utf8) LIKE '%admin%' OR CONVERT(`email` USING utf8) LIKE '%admin%') ORDER BY `username` ASC
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table ALIGN=center><tr>
        <th ALIGN=center>Phone number</th>
        <th ALIGN=center>email ID</th>
        </tr>";
    while($row = $result->fetch_assoc()) {
    echo "<tr>
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