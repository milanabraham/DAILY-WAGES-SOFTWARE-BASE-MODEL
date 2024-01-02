<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="container">
        <div class="right">
            <nav>
                <h1>User Timings</h1>
                <div class="center">
                    <form action="./usertiming.php" method="GET">
                        <input type="text" name="designation" placeholder="Search Designation">
                        <input type="submit">
                    </form>
                </div>
            </nav>
            <table border=1>
                <tr>
                    <th>DateTime</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Action</th>
                </tr>

                <?php
                include("../../connection.php");

                $sql = "SELECT * FROM `tbl_time`";
                if (isset($_GET['designation'])) {
                    $designation = $_GET['designation'];
                    $sql .= " WHERE id IN (SELECT Worker_ID FROM `tbl_user` WHERE `Designation`='$designation')";
                }

                $sql .= " ORDER BY `time` DESC";

                $result = mysql_query($sql);

                while ($tbl_time = mysql_fetch_array($result)) {
                    $userId = $tbl_time[1];
                    $userQuery = "SELECT * FROM `tbl_user` WHERE `Worker_ID`='$userId'";
                    $userResult = mysql_query($userQuery);

                    if (mysql_num_rows($userResult) > 0) {
                        $userDetails = mysql_fetch_assoc($userResult);
                        $userName = $userDetails['First_Name'];
                        $userDepartment = $userDetails['Designation'];
                ?>
                        <tr>
                            <td><?php echo $tbl_time[0]; ?></td>
                            <td><?php echo $tbl_time[1]; ?></td>
                            <td><?php echo $userName; ?></td>
                            <td><?php echo $userDepartment; ?></td>
                            <td><?php echo $tbl_time[2]; ?></td>
                        </tr>
                    <?php
                    } else {
                       
                    ?>
                        <tr>
                            <td><?php echo $tbl_time[0]; ?></td>
                            <td><?php echo $tbl_time[1]; ?></td>
                            <td>User Not Found</td>
                            <td>N/A</td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
    </div>
</body>

</html>
