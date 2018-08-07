<?php
    session_start();
    include ('connect.php');
    if(!isset($_SESSION['email'])){
	    header('location:login.php');
    }
    if(isset($_POST['sub'])){
        $_SESSION['id']=$_POST['productid'];
        header('location:view.php');
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
            <div id="dsply">
                <?php
                    $uname=$_SESSION['username'];
                    $result = mysqli_query($conn, "SELECT * FROM product");
                    while ($row = mysqli_fetch_array($result)) {
                        if($uname===$row['username'])
                        {
                            continue;
                        }
                        echo "<form method='POST' action=''>";
                        echo "<div id='img_div'>";
                        echo "<img src='uploads/".$row['image']."' >";
                        echo "<p>".$row['description']."</p>";
                        echo "<p> price :  ".$row['price']."</p>";
                        $id = $row['id'];
                        if($row['status']==1){
                            echo "<h4>AVAILABLE<h4>";
                            echo "<input type='text' value='$id' name='productid' hidden><br>";
                            echo "<input type='submit' value='view' name='sub'>";
                        }
                        else{
                            echo "<h4>SOLD OUT!</h4>";
                        }
                        echo "</div><br>";
                        echo "</form>";
                    }
                    
                ?>
            </div>
	</body>
</html>
