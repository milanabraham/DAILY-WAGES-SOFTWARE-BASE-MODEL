<html>
<head>
    <title>Add Work Details</title>
<link rel="stylesheet" type="text/css" href="../../style.css">
</head>

<body>
    <h1>Add Work Details</h1>

    <form method="post">
        <table border=1>
            <tr>
                <td><label for="title">Title:</label></td>
                <td><input type="text" name="title" required></td>
            </tr>
            <tr>
                <td><label for="description">Description:</label></td>
                <td><textarea name="description" rows="4" required></textarea></td>
            </tr>
            <tr>
                <td><label for="location">Location:</label></td>
                <td><input type="text" name="location" required></td>
            </tr>
            <tr>
                <td><label for="salary">Salary:</label></td>
                <td><input type="number" name="salary" required></td>
            </tr>
            <tr>
                <td><label for="start_date">Start Date:</label></td>
                <td><input type="date" name="start_date" required></td>
            </tr>
            <tr>
                <td><label for="end_date">End Date:</label></td>
                <td><input type="date" name="end_date" required></td>
            </tr>
        </table>

        <button type="submit">Add Work Details</button>
    </form>
</body>

</html>
<?php
include("../../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $insertQuery = "INSERT INTO `tbl_jobvacancy` (`Title`, `Description`, `Location`, `Salary`, `start_date`, `end_date`) 
                    VALUES ('$title', '$description', '$location', $salary, '$start_date', '$end_date')";

    $insertResult = mysql_query($insertQuery);

    if ($insertResult) {
         echo "<script>
            alert('User updated successfully.');
            window.location='./adminhome.html';
        </script>";
    } else {
        echo "Error adding work details: " . mysql_error();
    }
}
?>
