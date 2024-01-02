<?php
require("./connection.php");
    $email = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $query = "SELECT * FROM `tbl_user` WHERE Email = '$email' AND `Pass` = '$password'";
    $result = mysql_query($query);
    if ($row = mysql_fetch_assoc($result)) {
        if ($role == "admin") {
            header("Location: ./admin/admin_managment/adminhome.html");
            exit();
        } elseif ($role == "user") {
            $_SESSION['id'] = $row['Worker_ID'];
            header("Location: ./user/userdashboard.php");
            exit();
        }
    } 
    else {
        echo "Invalid username or password. Please try again.";
    }
    
?>
