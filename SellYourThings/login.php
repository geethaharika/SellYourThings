<?php 
	include "connect.php";
	session_start();
	if(isset($_SESSION['email'])) 
   		header('location: MainPage.php');
    	if(isset($_POST['sub'])) {
        	$email=$_POST['email'];
        	$pass=$_POST['password'];
        	$qry = "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$pass';";
        	$sql = mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
        	if(mysqli_num_rows($sql)>0) {
            		$row=mysqli_fetch_assoc($sql);
                    $_SESSION["email"] = $row['email'];
                    $_SESSION["username"] = $row['username'];
            		$_SESSION["password"] = $row['password'];
			//echo $_SESSION["email"]."----".$row['email'];
			print_r($_SESSION);
			echo "logged in";
            		header('location:MainPage.php');
       		} else {
            			$warning = "Invalid login";
		    } 
    	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Log In</title>
	        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		    <link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="header">
     			<?php include "header.php"?>   
        	</div>
		<form method="POST" action="" style="border:1px solid #ccc">
			<div class="container">
    				<h1>Log In</h1>
        			<label for="email"><b>Email</b></label>
    				<input type="text" placeholder="Enter Email" name="email">
				<label for="password"><b>password</b></label>
    				<input type="password" placeholder="Enter Password" name="password">
				<div class="clearfix">
      					<button type="submit" class="loginbtn" name="sub">Log In</button>
    				</div>
			</div>
    		</form>
	</body>
</html>