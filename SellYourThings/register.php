<?php
	include "connect.php";
	if(isset($_POST['sub'])) {
        $username = $_POST["username"];
		$name = $_POST["name"];
		$email = $_POST["email"];
		$phno = $_POST["phno"];
		$psw = $_POST["psw"];
		$repsw = $_POST["psw-repeat"];
		$sql = "INSERT INTO `user`(`username`,`name`, `email`,`phno`, `password`) VALUES ('$username','$name','$email','$phno','$psw')";
		mysqli_query($conn,$sql) or die("Connection failed: here" . mysqli_error($conn));
	        header('location: login.php');
exit;

	}
?>
<!Doctype html>
<html>
	<head>
		<title>Register</title>
	        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="header">
     			<?php include "header.php"?>   
        	</div>
		<form method="POST" action="" style="border:1px solid #ccc">
        		<div class="container">
    				<h1>Sign Up</h1>
    				<p>Fill in this form to create an account.</p>
    				<hr>
				<label ><b>Name</b></label>
    				<input type="text" placeholder="Enter Name" name="name" required>
    				<label ><b>Email</b></label>
    				<input type="text" placeholder="Enter Email" name="email" required>
				<label ><b>Username</b></label>
    				<input type="text" placeholder="username" name="username" required>    				
				<label ><b>Phone No</b></label>
    				<input type="text" placeholder="Enter phoneNo" name="phno" required>    			
				<label ><b>Password</b></label>
    				<input type="password" placeholder="Enter Password" id="password" name="psw" required>
				<label ><b>Repeat Password</b></label>
    				<input type="password" placeholder="Repeat Password" id="repassword"name="psw-repeat"  required>
    				<div class="clearfix">
      					<button type="submit" class="signupbtn" name="sub" onclick="validSub()"">Sign Up</button>
    				</div>
  			</div>
		</form>
		<script>
			var password = document.getElementById("password");
  			var repassword = document.getElementById("repassword");
			var flag=0;
			function validSub(){
				if(password.value != repassword.value) {
					password.value=null;
					repassword.value=null;
					event.preventDefault()
				}
			}
		</script>
	</body>
<html>