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
</style>


</head>
<body>




<nav class="navbar navbar-inverse" style="padding: 17px; word-spacing: 5px; margin-bottom: 0px;background-color: #1d1d1d;">
	<div class="container-fluid">
		<div class="navbar-header">
			
			<!---------   adding logo    --------->
			<img src="images/9.jpg" style="height: 70px;padding-bottom:22px ; width: 220px;">

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
						<li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span></a> </li>
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></li>
					</ul>
			<?php
				}
				else
				{

				}
			?>			
	</div>
</nav>
<br>


</body>
</html>