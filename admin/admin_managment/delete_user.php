<?php
$email= $_GET["email"];
require("../../connection.php");
$query = "DELETE FROM `tbl_user` WHERE `Email`='$email'";
$result = mysql_query($query);

if ($result) {
    echo "<script>
            alert('User Deleted successfully.');
            window.location='./managestaff.php';
        </script>";
} else {
    echo "Error: " . mysql_error();
}
mysql_close($conn);
?>
