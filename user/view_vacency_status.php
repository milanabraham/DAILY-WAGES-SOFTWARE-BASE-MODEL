<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Leave Approval</h1>
    <table border="1">
    <tr>
        <th>Employee ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Type</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Reason</th>
        <th>Status</th>
    </tr>

    <?php
    require("../connection.php");
    session_start();
    $id=$_SESSION['id'];
    $query = "SELECT * FROM `tbl_leave` where e_id='$id'";
    $result = mysql_query($query);

    while ($row = mysql_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$row['e_id']."</td>";
        echo "<td>".$row['e_fname']."</td>";
        echo "<td>".$row['e_lname']."</td>";
        echo "<td>".$row['e_type']."</td>";
        echo "<td>".$row['e_start']."</td>";
        echo "<td>".$row['e_end']."</td>";
        echo "<td>".$row['e_reason']."</td>";
        echo "<td>".$row['e_status']."</td>";
        echo "</tr>";
    }
    ?>

</table>
</body>
</html>