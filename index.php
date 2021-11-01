<?php
    session_start();

    $conn = new mysqli("localhost", "root", "", "nproject");

    $msg = "";
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_Type = $_POST['user_Type'];

        $sql = "SELECT * FROM users WHERE username=? AND password=? AND user_type=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss",$username,$password,$user_Type);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        session_regenerate_id();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['user_type'];
        session_write_close();

        if($result->num_rows==1 && $_SESSION['role']== "admin"){
            header("location:admin.php");
        }
        else if($result->num_rows==1 && $_SESSION['role']== "retailer"){
            header("location:retailer.php");
        }
        else if($result->num_rows==1 && $_SESSION['role']== "customer"){
            header("location:customer.php");
        }
        else{
            $msg = "You have entered a wrong username or password, please contact your Admin";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shobkichu</title>
</head>
<body>
    <fieldset>
    <legend ALIGN="center"><h1>Shob-Kichu</h1></legend>

    
        <center><h3>Anything, Anytime, Anywhere</h3></center>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="post">    
        <table ALIGN="center">
                <thead>
                    <tr>
                        <td align=center><label for="username">User name</label></td>
                        <td align=center><input type="text" name="username" placeholder="Enter your username" required></td>
                    </tr>   
                    <tr> 
                        <td align=center><label for="password">Password</label></td>
                        <td align=center><input type="password" name="password" placeholder="Enter your password" required></td>
                    </tr>
                    <tr> 
                        <td align=center><label for="user_Type">Select User-Type:</label></td>
                        <td align=center>
                        <select name="user_Type">
			                <option name="admin"  selected value="admin">Admin</option>
			                <option name="retailer" value="retailer">Retailer</option>
			                <option name="customer" value="Customer">Customer</option>
		                </select>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align=center>
                            <button type="submit" name="login">Login</button>
                            <button type="reset">Reset</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <br>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <br>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align=center>Not a user yet? <button><a href="joinus.html">Join Us</a></button></td>
                    </tr>
                    <tr>
                        <td colspan="2" align=center>Would you like to ask a question ?
                        <button><a href="contact.html">Contact Us</a></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h5><?= $msg; ?></h5>
        
    </fieldset>
</body>
</html>