<?php
    session_start();
    include ('connect.php');
    if(!isset($_SESSION['email'])){
	    header('location:login.php');
    }
    if(isset($_POST['sub'])){
        $phno = $_POST['phno'];
        $pid = $_SESSION['id'];
        $qry = "SELECT * FROM `product` WHERE `id`= '$pid';";
        $sql = mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
        if(mysqli_num_rows($sql)>0) {
            $row=mysqli_fetch_assoc($sql);
            $user = $row['username'];
            $sql = "INSERT INTO `notification`(`username`,`phno`) VALUES ('$user','$phno')";
            mysqli_query($conn,$sql) or die("Connection failed: here" . mysqli_error($conn));
            header('location:MainPage.php');
        }
    }
?>
<!Doctype html>
<html>
	<head>
	        <title>Sell Old</title>
	        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="view.css">
 	</head>
	<body>		
		<div class="header">
     			<?php include "header.php"?>
        </div>
        <?php
            $id = $_SESSION['id'];
            $result = mysqli_query($conn, "SELECT * FROM product where $id = `id`");
            if(mysqli_num_rows($result)>0) {
                $row=mysqli_fetch_assoc($result);
                echo "<form method='POST' action=''>";
                echo "<img src='uploads/".$row['image']."' >";
                echo "<p>".$row['description']."</p>";
                echo "<p> price :  ".$row['price']."</p>";
                echo "PHONE NO:<input type='text' name = 'phno' required><br>";
                echo "<input type='submit' value='BUY' name='sub'>";
                echo "</form>";
            }
        ?>     
	</body>
</html>