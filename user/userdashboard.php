<?php 
include("../connection.php");

?>
<html>

<head>
    <title>Operations Page</title>
    <link rel="stylesheet" href="../style.css">
    <style>
    	body {
    		font-family: Helvetica, sans-serif;
    		color: white;
    		text-align: center;
    		display: grid;
  		  place-content: center;
   		 height: 100vh;
    		overflow: hidden;
	}
	.container {
    		display: flex;
    		justify-content: space-evenly;
  		  align-items: center;
  		  width: 80vw;
  		  padding: 6% 0%;
	}
	.card {
 	   height: 40vh;
 	   width: 20vw;
 	   background-color: #A597FF82;
 	   display: grid;
 	   place-content: center;
 	   border-radius: 15px;
 	   box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
 	   border: 1px solid rgba(165, 151, 255, 0.61);
	}

	.card:hover{
 	   background-color: #6f5edf82;
 	   border: 1px solid rgba(165, 151, 255, 0.61);
	}
    </style>
</head>

<body>
    <div class="title">
        <h1>Select Operation</h1>
    </div>
    <div class="container">
        <a href="./punch_in.php">
            <div class="card">
                <h2>PUNCH IN</h2>
            </div>
        </a>
        <a href="./punch_out.php">
            <div class="card">
                <h2>PUNCH OUT</h2>
            </div>
        </a>
        <a href="./payslip.php">
            <div class="card">
                <h2>VIEW PAYSLIP</h2>
            </div>
        </a>
    </div>
</body>

</html>
