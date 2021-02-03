<?php
	include"connection.php";
	include"navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style type="text/css">
		.form-control
		{
			width: 220px;
			height: 30px;
		}
		label
		{
			color: white;
		}
	</style>
</head>
<body style="background-color: violet; height: 800px;">

	<?php
		$sql="SELECT * FROM `register` where username='$_SESSION[login_user]';";
		$res = mysqli_query($db,$sql);

		while($row=mysqli_fetch_assoc($res))
		{
			$first=$row['first'];
			$last=$row['last'];
			$email=$row['email'];
			$phone=$row['contact'];
			$password=$row['password'];	
		}
	?>

	<center>	
	<div class="profile_info" style="text-align: center; background-color: black; opacity: .7; width: 450px; height: 640px; ">
	
	<h2 style="text-align: center; color: white; padding-top: 10px;">EDIT INFORMATION</h2>

		<span style="color: white;">WELCOME </span>
			<h4 style="color: white;"> 
				<?php
					echo $_SESSION['login_user'];
				?>
			</h4>
	<center>
	<form action="" method="post" enctype="multipart/form-data" >	

		<label><h4><b>First Name : </b></h4>	</label>
			<input class="form-control" type="text" name="first" value="<?php echo $first; ?>">
		<label><h4><b>Last Name : </b></h4>	</label>		
			<input class="form-control" type="text" name="last" value="<?php echo $last; ?>">
		<label><h4><b>E-mail : </b></h4>	</label>		
			<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
		<label><h4><b>Phone No. : </b></h4>	</label>	
			<input class="form-control" type="text" name="phoneno" value="<?php echo $phone; ?>">
		<label><h4><b>Password : </b></h4>	</label>	
			<input class="form-control" type="text" name="password" value="<?php echo $password; ?>">
		<label><h4><b>Profile picture :</b></h4></label>		
			<input class="form-control" type="file" name="file" ><br>
			<button class="btn btn-default" type="submit" name="submit">CHANGE</button>

	</form>
	</center>	
	</div>
	</center>

	<?php
		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);  	

			$first=$_POST['first'];
			$last=$_POST['last'];
			$email=$_POST['email'];
			$phone=$_POST['phoneno'];
			$password=$_POST['password'];
			$pic=$_FILES['file']['name'];	
			
			$sql1="UPDATE `register` SET `first`='$first',`last`='$last',`email`='$email',`contact`=$phone,`password`='$password', `pic`='$pic' WHERE `username`='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{				
				?>
					<script type="text/javascript">
						alert("saved successfully.");
						window.location="profile.php";	
					</script>
				<?php
			}	
			else
			{
				?>
				<script type="text/javascript">
					alert("update UNSUCCESSFUL!!!");
				</script>
				<?php
			}
		}
	?>	

</body>
</html>