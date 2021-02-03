<?php
	session_start();
	include "connection.php";
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
	li
	{
		
	}
	.card{
		 background-color:#000011;
	}
	.brand{
    		background:#1d1d1d !important;
    	}
    	.brand-text{
    		color:#070707 !important;
    		size:600px;
    		text-align: center;
    	}
    	
    	.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar  a:hover, .dropdown:hover .dropbtn {
  background-color: black;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>


</head>
<body>




<nav class="navbar navbar-inverse" style="padding: 15px; word-spacing: 5px; margin-bottom: 0px;background-color: #1d1d1d;">
	<div class="container-fluid">
		<div class="navbar-header">
			
			<!---------   adding logo    --------->
			<img src="images/9.jpg" style="height: 70px; padding-bottom:22px ; width: 220px;">

			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


		</div>
		<div>
			<ul class="nav navbar-nav">
				<li><a href="index.php" style="font-size: 16px; text-decoration: none; display: bold;"><span class=" glyphicon glyphicon-home"> HOME</span></a></li>
				<li><a href="registration.php" style="font-size: 16px;"><span class=" glyphicon glyphicon-user	"> SIGN-UP</span></a></li>
				<li><a href="login.php" style="font-size: 16px;"><span class="glyphicon glyphicon-log-in"> SIGN-IN</span></a></li>
			</ul>
		</div>




			<?php 
				if(isset($_SESSION['login_user']))
				{
			?>
					<ul class="nav navbar-nav navbar-right">

						<li><a href="add.php" class="btn brand z-depth-0" style="padding:17px 0px;">Add Event</a></li>
						<li><a href="add.php" class="btn brand  z-depth-0" style="padding:17px 0px;">MORE</a></li>
					
						<li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span></a> </li>
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
						
					</ul>
					<!-- <ul id="nav-mobile" class="right hide-on-small-and-down"> -->
			<?php
				}
				else
				{
					
				}
			?>			
	</div>
	
</nav>
<br>

	<h3 class="center black-text" style="">WELCOME </h>
	 <?php 

			echo $_SESSION['first']. " ". $_SESSION['last'];
		 ?> 

</body>
</html>