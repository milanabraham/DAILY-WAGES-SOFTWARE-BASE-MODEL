<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<body>

<?php
require("../../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $worker_id = $_POST["worker_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $designation = $_POST["j_title"];
    $query = "UPDATE `tbl_user` 
              SET `First_Name`='$first_name', `Last_Name`='$last_name', `Phone_No`='$phone_number', `Email`='$email', `Pass`='$password', `user_type`='$role',Designation = '$designation'
              WHERE `Worker_ID`='$worker_id'";
    
    $result = mysql_query($query);

    if ($result) {
        echo "<script>
            alert('User updated successfully.');
            window.location='./adminhome.html';
        </script>";
    } else {
        echo "Error: " . mysql_error();
    }

    mysql_close($conn);
} else {
    $email = $_GET["email"];

    $query = "SELECT * FROM `tbl_user` WHERE `Email`='$email'";
    $result = mysql_query($query);

    if ($result) {
        $row = mysql_fetch_assoc($result);
        $worker_id = $row["Worker_ID"];
        $first_name = $row["First_Name"];
        $last_name = $row["Last_Name"];
        $phone_number = $row["Phone_No"];
        $email = $row["Email"];
        $password = $row["Pass"];
        $role = $row["user_type"];
        $des = $row["Designation"];
        echo "<h1>Update User</h1>";
        echo "<form method='POST' action='update_user.php'>";
        echo "Worker ID: <input type='text' name='worker_id' value='$worker_id' readonly><br>";
        echo "First Name: <input type='text' name='first_name' value='$first_name'><br>";
        echo "Last Name: <input type='text' name='last_name' value='$last_name'><br>";
        echo "Phone Number: <input type='text' name='phone_number' value='$phone_number'><br>";
        echo "Email: <input type='text' name='email' value='$email'><br>";
        echo "Password: <input type='text' name='password' value='$password'><br>";
        echo '<label for="role">Role:</label>
        <select name="role" id="role">
            <option value="user" ' . ($role === 'user' ? 'selected' : '') . '>User</option>
            <option value="admin" ' . ($role === 'admin' ? 'selected' : '') . '>Admin</option>
        </select> <br>';
        echo '<label for="job_title">Job Title:</label>';
        echo '<select name="j_title" id="job_title">';
       
        $designationQuery = "SELECT DISTINCT Title FROM tbl_jobvacancy";
        $designationResult = mysql_query($designationQuery);

        while ($designationRow = mysql_fetch_array($designationResult)) {
            $designation = $designationRow['Title'];
            echo "<option value='$designation'>$designation</option>";
        }

    echo "</select>";
        echo "<br>";
        echo "<input type='submit' value='Update User'>";
        echo "</form>";
    } else {
        echo "Error: " . mysql_error();
    }
    mysql_close($conn);
}
?>

	</body>
</html>
