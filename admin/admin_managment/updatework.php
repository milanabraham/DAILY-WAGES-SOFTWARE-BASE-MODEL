<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Work Details</title>
      <link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>
    <h1>Update Work Details</h1>

    <?php
    include("../../connection.php");

    if (isset($_POST['submit'])=='select'){
        $job_id = $_REQUEST['j_title'];
        $selectQuery = "SELECT * FROM `tbl_jobvacancy` WHERE `Title` = '$job_id'";
        $result = mysql_query($selectQuery);

        if ($result && mysql_num_rows($result) > 0) {
            $row = mysql_fetch_assoc($result);
            ?>
            <form method="POST">
                <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">

                <label for="title">Title:</label>
                <input type="text" name="title" value="<?php echo $row['Title']; ?>" required><br>

                <label for="description">Description:</label>
                <textarea name="description" rows="4" required><?php echo $row['Description']; ?></textarea><br>

                <label for="location">Location:</label>
                <input type="text" name="location" value="<?php echo $row['Location']; ?>" required><br>

                <label for="salary">Salary:</label>
                <input type="number" name="salary" value="<?php echo $row['Salary']; ?>" required><br>

                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" value="<?php echo $row['start_date']; ?>" required><br>

                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" value="<?php echo $row['end_date']; ?>" required><br>

                <input type="submit" value="update" name="submit">
            </form>
            <?php
        } else {
            echo "Job ID not found.";
        }
    } else {
    
    ?>

	<form method="POST">
		<select name="j_title" id="job_title">
        <?php
        $designationQuery = "SELECT DISTINCT Title FROM tbl_jobvacancy";
        $designationResult = mysql_query($designationQuery);

        while ($designationRow = mysql_fetch_array($designationResult)) {
            $designation = $designationRow['Title'];
            echo "<option value='$designation'>$designation</option>";
        }

	echo'<input type="submit" value="select" name="submit">';
        
    echo"</select>";
echo"</form>";
}
?>
</body>
</html>
<?php

if (isset($_POST['submit'])) {
    if($_REQUEST['submit']=='update'){
    	$job_id = $_POST['job_id'];
    	$title = $_POST['title'];
    	$description = $_POST['description'];
    	$location = $_POST['location'];
    	$salary = $_POST['salary'];
    	$start_date = $_POST['start_date'];
    	$end_date = $_POST['end_date'];


    	$updateQuery = "UPDATE `tbl_jobvacancy` 
                    SET `Title`='$title', `Description`='$description', `Location`='$location', `Salary`='$salary', `start_date`='$start_date', `end_date`='$end_date' WHERE `Title`='$job_id'";

    	$updateResult = mysql_query($updateQuery);

    	if ($updateResult) {
       	echo "<script>
            alert('User updated successfully.');
            window.location='./adminhome.html';
        </script>";
    	} else {
       	 echo "Error updating work details: " . mysql_error();
    	}
    }
}
?>



