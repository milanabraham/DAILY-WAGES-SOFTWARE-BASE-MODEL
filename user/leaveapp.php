<?php
    include("../connection.php");
    session_start();
    $e_id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Leave Application</title>
</head>
<body>
    <h2>Leave Application Form</h2>
    <form action="./leaveapp.php" method="POST">
            <label for="ID">ID:</label>
            <input type="text" id="ID" name="ID" value='<?php echo $e_id; ?>' disabled required><br><br>
    <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>
    <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>
     <label for="leave_type">Leave Type:</label>
        <select id="leave_type" name="leave_type" required>
            <option value="vacation">Vacation</option>
            <option value="sick">Sick Leave</option>
            <option value="personal">Personal Leave</option>
            <!-- Add more leave types as needed -->
        </select><br><br>
        
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>
        
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br><br>
        
        <label for="reason">Reason for Leave:</label><br>
        <textarea id="reason" name="reason" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" value="Submit Leave Application">
    </form>
</body>
</html>
<?php
if(isset($_REQUEST['first_name'])){
    //$id = $_REQUEST['ID'];
    $fname = $_REQUEST['first_name'];
    $lname = $_REQUEST['last_name'];
    $type = $_REQUEST['leave_type'];
    $start = $_REQUEST['start_date'];
    $end = $_REQUEST['end_date'];
    $reason = $_REQUEST['reason'];

    $sql="INSERT INTO `tbl_leave` VALUES ('','$e_id','$fname','$lname','$type','$start','$end','$reason','waiting')";
    $result=mysql_query($sql);

    if($result){
        echo "<script>alert('Data Added Successfully');
        window.location.href='./userdashboard.php';
        </script>";
    }
    else{
        echo "<script>alert('Error');
        window.location.href='./leaveapp.php';
        </script>";
    }

}
?>