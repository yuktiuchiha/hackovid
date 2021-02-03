<?php
	session_start();
	include"connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
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
</style>

</head>
<body>
<?php
	
	$r=mysqli_query($db,"SELECT COUNT(seen_status) AS `total` FROM `queries` where `seen_status`='no' and `sender`='admin';"); 
 	$c=mysqli_fetch_assoc($r);
?>


<nav class="navbar navbar-inverse" style="padding: 17px; word-spacing: 5px; margin-bottom: 0px;background-color: #1d1d1d;">
	<div class="container-fluid">
		<div class="navbar-header">
			
			<!---------   adding logo    --------->
			<img src="images/9.jpg" style="height: 70px; width: 220px;">

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
					<ul class="nav navbar-nav">
						<li><a href="eventparticipation.php" style="font-size: 16px; text-decoration: none; display: bold;"><span class=" glyphicon glyphicon-home"> MY-RECORD</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right" style="width: 370px;">
						<?php
							$res=mysqli_query($db,"SELECT * from `register` where username='$_SESSION[login_user]' ;");
							while ($row=mysqli_fetch_assoc($res)) 
							{
								if($row['status']=='student')
								{						
						?>

						<li><a href="queries.php"><span class="glyphicon glyphicon-envelope"></span> <span class="badge bg-green">
							<?php
								echo $c['total'];
							?>
						</span> </a> </li>
						<li><a href="profile.php">
						<div style="color: white;">
						
						<?php
							echo "<img class='img-circle profile_img' height=38 width=38 style='' src='images/".$_SESSION['pic']." '>";
							echo" Hi, ".$_SESSION['login_user'];
						?>
						</div> 
					</a></li>
						

						<?php
								}
								else
								{

									$r=mysqli_query($db,"SELECT COUNT(seen_status) AS `total` FROM `queries` where `seen_status`='no' and `sender`='student';");  
 									$c=mysqli_fetch_assoc($r);

						?>

						<li><a href="replies.php"><span class="glyphicon glyphicon-comment"></span> <span class="badge bg-green">
							
							<?php
								echo $c['total'];
							?>

						</span> </a> </li>
						<li><a href="profile.php">
						<div style="color: white;">
						
						<?php
							echo "<img class='img-circle profile_img' height=38 width=38 src='images/".$_SESSION['pic']." '>";
							echo" Hi, ".$_SESSION['login_user'];
						?>
						</div> 
					</a></li>

						<?php
								}
							}	
						?>

						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
					</ul>
			<?php
				}
				else
				{

				}
			?>			
	</div>
</nav>
</body>
</html>