<?php
include("../connection.php");

  $adminId = $_SESSION['id'];
  
 
  $query = "SELECT * FROM `tbl_user` WHERE `Worker_ID`='$adminId'";
  $result = mysql_query($query);

  if (mysql_num_rows($result) > 0) {
    
    $latestStatusQuery = "SELECT `status` FROM `tbl_time` WHERE `id`='$adminId' ORDER BY `time` DESC LIMIT 1";
    $latestStatusResult = mysql_query($latestStatusQuery);

    if (mysql_num_rows($latestStatusResult) > 0) {

      $latestStatus = mysql_fetch_array($latestStatusResult)['status'];

      if ($latestStatus == 'punch in') {
        
        echo "<script>
          alert('You are already punched in!');
          window.location.href = 'userdashboard.php';
        </script>";
      } 
      else {
       
        $currentDatetime = date("Y-m-d H:i:s");
        $insertQuery = "INSERT INTO `tbl_time` VALUES ('$currentDatetime', '$adminId', 'punch in','','0')";
        $insertResult = mysql_query($insertQuery);

        if ($insertResult) {
          echo "<script>
            alert('Punch-in successful!');
            window.location.href = 'userdashboard.php';
          </script>";
        } 
        else {
          echo "<script>
            alert('Error logging punch-in time.');
          </script>";
        }
      }
    } else {
  
      $currentDatetime = date("Y-m-d H:i:s");
      $insertQuery = "INSERT INTO `tbl_time` VALUES ('$currentDatetime', '$adminId', 'punch in','','0')";
      $insertResult = mysql_query($insertQuery);

      if ($insertResult) {
        echo "<script>
          alert('Punch-in successful!');
          window.location.href = 'userdashboard.php';
        </script>";
      } else {
        echo "<script>
          alert('Error logging punch-in time.');
        </script>";
      }
    }
  } else {
    echo "<script>
      alert('Invalid credentials. Please try again.');
    </script>";
  }

?>
