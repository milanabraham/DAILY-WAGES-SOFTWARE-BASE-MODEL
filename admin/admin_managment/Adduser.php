<?php
require("../../connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $job = $_POST['j_title'];

    // Insert the new user into the 'login' table
    $query = "INSERT INTO `tbl_user`  VALUES ('','$first_name', '$last_name', '$phone_number', '$email','$password','$role','$job')";
    $result = mysql_query($query);

    if ($result) {
        echo "<script>
            alert('User Added successfully.');
            window.location='./adminhome.html';
        </script>";
    } else {
        echo "<p>Error adding user: " . mysql_error() . "</p>";
    }
}
?>
<html>
<head>
<link rel="stylesheet" href="../../style.css">
</head>
<h2>Add New User</h2>
<form method="post" action="">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required><br><br>

    <label for="phone_number">Phone Number:</label>
    <input type="text" name="phone_number" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br><br>

    <label for="role">Role:</label>
    <select name="role" id="role">
        <option value="user" selected>User</option>
        <option value="admin">Admin</option>
    </select>
    <br><br>
    
    <label for="job_title">Job Title:</label>
    <select name="j_title" id="job_title">
        <?php
        // Retrieve Designation options from tbl_user
        $designationQuery = "SELECT DISTINCT Title FROM tbl_jobvacancy";
        $designationResult = mysql_query($designationQuery);

        while ($designationRow = mysql_fetch_array($designationResult)) {
            $designation = $designationRow['Title'];
            echo "<option value='$designation'>$designation</option>";
        }
        ?>
    </select>
    <br><br>

    <input type="submit" value="Add User">
</form>
</body>
</html>
