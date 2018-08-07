<?php
	session_start();
	include("connect.php");
?>
<!Doctype html>
<html>
	<head>
	        <title>Sell Old</title>
	        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	        <meta name="viewport" content="width=device-width, initial-scale=1">
 	</head>
	<body>		
		<div class="header">
     			<?php include "header.php"?>
            </div>
			<?php
						$uname=$_SESSION['username'];
						$qry = "SELECT * FROM `notifications` WHERE `username`= '$uname';";
        				$sql = mysqli_query($conn,$qry);
						echo "<h4>Notifications:</h4>";
						echo "<ul>";
						while ($row = mysqli_fetch_array($sql)) {
							echo "<li>".$row['phno']."</li>";
						}
						echo "</ul>";
			?>
            
	</body>
</html>