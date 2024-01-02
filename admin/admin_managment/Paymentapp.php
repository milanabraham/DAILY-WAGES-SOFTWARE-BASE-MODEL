<html>

<head>
    <title>Payment Approval</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<body>
    <h1>Payment Approval</h1>
    <table border="1">
        <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Activity Time</th>
            <th>Status</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>

        <?php
        require("../../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["approve"])) {
        $time_id = $_POST["time_id"];
        $user_id = $_POST["user_id"];
        $status = "approve";
        $sqlDesignation = "SELECT Designation FROM tbl_user WHERE Worker_ID = '$user_id'";
$resultDesignation = mysql_query($sqlDesignation);
$rowDesignation = mysql_fetch_assoc($resultDesignation);

if ($rowDesignation) {
    $designation = $rowDesignation['Designation'];
    $sqlSalary = "SELECT Salary FROM tbl_jobvacancy WHERE Title = '$designation'";
    $resultSalary = mysql_query($sqlSalary);
    $rowSalary = mysql_fetch_assoc($resultSalary);

    if ($rowSalary) {
        $salary = $rowSalary['Salary'];
        $updateQuery = "UPDATE `tbl_time` SET `payment_status`='$status', `wage`='$salary' WHERE `time`='$time_id' AND id='$user_id'";
        $updateResult = mysql_query($updateQuery);

        if (!$updateResult) {
            echo "<script>alert('Update Error')</script>";
        }
    } else {
        echo "<script>alert('Salary not found for the given Designation')</script>";
    }
} else {
    echo "<script>alert('User not found or missing job details')</script>";
}

    } elseif (isset($_POST["decline"])) {
        $user_id = $_POST["user_id"];
        $time_id = $_POST["time_id"];
        $status = "decline";
        $updateQuery = "UPDATE `tbl_time` SET `payment_status`='$status', `wage`='0' WHERE `time`='$time_id' AND id='$user_id'";
        $declineResult = mysql_query($updateQuery);
        if (!$declineResult) {
            echo "<script>alert('Decline Error')</script>";
        }
    }
}

        $query = "SELECT t.*, u.*
          FROM tbl_time t
          JOIN tbl_user u ON t.id = u.Worker_ID
          WHERE 
          (t.payment_status='waiting'
          OR t.payment_status='Approve'
          OR t.payment_status='decline')
		ORDER BY time DESC";
        $result = mysql_query($query);


    
        while ($row = mysql_fetch_array($result)) {
            
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['First_Name'] . "</td>";
            echo "<td>" . $row['Last_Name'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['payment_status'] . "</td>";
            echo "<td>" . $row['wage'] . "</td>";
            echo "<td>
                    <form method='POST'>
                        <input type='hidden' name='time_id' value='" . $row['time'] . "'>
                        <input type='hidden' name='user_id' value='" . $row['id'] . "'>
                        <input type='submit' name='approve' value='Approve'>
                        <input type='submit' name='decline' value='Decline'>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>

    </table>
</body>

</html>
