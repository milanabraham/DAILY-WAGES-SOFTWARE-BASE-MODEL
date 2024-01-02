<html>
<head>
    <title>View SLip</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<a href="./userdashboard.php">GO BACK</a>
<?php
include("../connection.php");
$user_id = $_SESSION['id'];
$sql = "SELECT *
        FROM tbl_time t
        WHERE t.id = $user_id AND 
        (t.payment_status='waiting'
        OR t.payment_status='Approve'
        OR t.payment_status='decline')";

$result = mysql_query($sql);
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        $time = $row['time'];
        $payment_status = $row['payment_status'];
        $wage = $row['wage'];
        echo"<table border=1>";
            echo "<tr>";
                echo "<td><p>Date: $time</p></td>";
                echo "<td><p>Payslip Status: $payment_status</p></td>";
                echo "<td><p>Salary: $wage</p></td>";
            echo "<tr>";
        echo"</table>";
    }
} else {
    echo "No results found";
}
?>
</body>
</html>
