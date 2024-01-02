<html>
<head>
    <title>User Management</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<style>
    table{
        text-align: center;
    }
</style>
<body>

<h1>Add User</h1>
<a href="./Adduser.php">Add User</a>

<h1>Existing Users</h1>
<table border="1">
    <tr>
        <th>Worker ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Role</th>
        <th>Designation</th>
        <th>Action</th>
    </tr>

    <?php
    require("../../connection.php");
    $query = "SELECT * FROM `tbl_user`";
    $result = mysql_query($query);

    while ($row = mysql_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$row[0]."</td>";
        echo "<td>".$row[1]."</td>";
        echo "<td>".$row[2]."</td>";
        echo "<td>".$row[3]."</td>";
        echo "<td>".$row[4]."</td>";
        echo "<td>".$row[6]."</td>";
        echo "<td>".$row[7]."</td>";
        echo "<td>
                <a href='update_user.php?email=".$row[4]."'>Update</a> |
                <a href='delete_user.php?email=".$row[4]."'>Delete</a>
              </td>";
        echo "</tr>";
    }
   ?>

</table>

</body>
</html>
