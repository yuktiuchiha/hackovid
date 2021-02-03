<?php
	include "connection.php";
	include "navbar.php"; 	
?>


<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	<style type="text/css">
		section
     	{
            width: 100%;
            height: 600px;
            margin: 0px;
            padding: 0px;
            background-color: green;
        }
	</style>

</head>
<body>


	<center>
	<section style="width: 100%;">
		<div class="login-img" style="width: 100%;height: 100%; background-repeat: no-repeat; background-color: red;">
			<br>
			<div class="box1">
				<br>
				<h1 style="text-align: center;font-size: 35px; font-family: Lucida Console; color: white; padding-left: 15px; margin-left: 0px">WELCOME</h1><br>
				<h1 style="text-align: center; font-size: 25px; color: white; ">USER LOGIN FORM</h1>
				<form name="login" action="" method="post">
				<div class="login">
					<br>
					<input class="form-control" type="text" name="username" placeholder="username" required=""><br><br>
					<input class="form-control" type="password" name="password" placeholder="password" required=""><br><br>
					<input list="status" name="status" class="form-control" type="text" placeholder="STUDENT/ADMIN" required="">
  							<datalist id="status">
      							<option value="student">
						 	 	<option value="admin">
  							</datalist><br>
					<input class="btn .btn-success" type="submit" name="submit" value="login" style="color: white; width: 70px; height: 30px;background-color: blue;">
				</div>	
				
				<p style="color: white;">
					<br><br>
					<a style="color: white; margin-left: 20px;" href="forgotpassword.php">FORGOT PASSWORD?</a>

					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

					New to this website?<a style="color: white;" href="registration.php">SIGN-UP</a>
				</p>
				</form>
			</div>	
		</div>
	</section>
	</center>
	<?php

		if(isset($_POST['submit']))
		{
			$count=0;
			$res=mysqli_query($db,"SELECT * FROM `register` WHERE username='$_POST[username]' && password='$_POST[password]';");
			
			$row=mysqli_fetch_assoc($res);

			$count=mysqli_num_rows($res);

			if($count==0)
			{
	?>
			<!--	<script type="text/javascript">
					alert("the username and password do not match.");
				</script>  -->
				<div>
					<center><strong class="alert alert-danger" style="width: 700px; margin-top: 0px;">
						the username and password do not match.
					</strong></center>
				</div>
	<?php

			}
			else
			{
				$_SESSION['login_user']=$_POST['username'];
				$_SESSION['pic']=$row['pic'];
				$_SESSION['username']='';
				?>
				<script type="text/javascript">
					window.location="index.php";
				</script>	
				<?php
			}
		
		}
	?> 

</body>
</html>