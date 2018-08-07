<nav class="navbar navbar-default "  style="background-color: aqua;">
 	<div class="container-fluid">
 		<div class="navbar-header">
       			<a class="navbar-brand" href="#">Sell Old</a>
 	   	</div>
       		      	<ul class="nav navbar-nav navbar-right">
			        <?php  if(!isset($_SESSION['email'])) {    ?>
				        <li><a href="register.php">Register</a></li>
        			    <li><a href="login.php">Login</a></li>
			        <?php  } ?>
      				<?php if(isset($_SESSION['email'])) {    ?>
					    <li><a href="MainPage.php">Home</a></li>
                        <li><a href="sell.php">Sell</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <li><a href="notifications.php">notifications</a></li>
       				<?php  } ?>
       	         	</ul>
      	</div>
</nav>