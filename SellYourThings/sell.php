<?php
    session_start();
    include ('connect.php');
    if(!isset($_SESSION['email'])){
	    header('location:login.php');
    }
	$username = $_SESSION['username'];
    if(isset($_POST['sell'])){
        $image=$_FILES['image']['name'];
	    $type = $_POST['category'];
	    $productname = $_POST['name'];
	    $description = $_POST['description'];
	    $price = $_POST['price'];
        $status = 1;
        $sql = "INSERT INTO `product` (`username`,`image`,`type`,`productname`,`description`,`price`,`status`) VALUES ('$username','$image','$type','$productname','$description','$price','$status');";
        mysqli_query($conn,$sql) or die("Connection failed: here" . mysqli_error($conn));
        move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$image) or die("error moving file");
}
?>
<!Doctype html>
<html>
    <head>
        <title>Sell Old</title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">    
    </head>
    <body>
        <div class="header">
     		<?php include "header.php"?>
        </div>
        <form method="post" action="" enctype="multipart/form-data"  style="border:1px solid #ccc; padding:1% 2%"> 
		<select name="category">
			<option value="">Select Any One</option>
			<option name="sel" value="">House</option>
			<option name="sel" value="">Cars</option>
		</select><br>		
        Product Name<input type="text" name="name"><br>      
        Description<textarea name="description"></textarea><br>
        Price<input type="text" name="price"><br>
        Photo<input type="file" name="image" id="photo"><br>
        <input type="submit" name="sell" value="Click to Submit">	
	</form>                
    </body>
</html>