<?php
    include("../connection.php");
        $job_title = $_POST["job_title"];
        $job_description = $_POST["job_description"];
        $job_location = $_POST["job_location"];
        $salary = $_POST["salary"];
        $sql = "INSERT INTO  tbl_jobvacancy VALUES ('$job_title','$job_description','$job_location','$salary')";
        $result=mysql_query($sql);
    ?>
