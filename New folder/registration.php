<?php
	include"connection.php";
	include"navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
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
            height: 670px;
            margin: 0px;
            padding: 0px;
            background-color: green;
        }
        body
        {
        	width: 100%;
            height: 100%;
            margin: 0px;
            padding-bottom: 0px;
        }
	</style>

</head>
<body>
	<section><center>
		<div class="reg-img" style="height: 670px;">
			<br>
			<center>
			<div class="box2" style="color: maroon;">
				<br>
				<h1 style="text-align: center;font-size: 35px; font-family: Lucida Console; color: white;">WELCOME</h1>
				<h1 style="text-align: center; font-size: 25px; color: white;">USER REGISTRATION FORM</h1>
				<form name="Registration" action="" method="post">
					<div class="login">
						<br>
						<input class="form-control" type="text" name="first" placeholder="First Name" required=""><br>
						<input class="form-control"type="text" name="last" placeholder="Last Name" required=""><br>
						<input class="form-control"type="email" name="email" placeholder="email" required=""><br>
						<input class="form-control"type="text" name="contact" placeholder="phone no." required=""><br>
						<input class="form-control"type="text" name="username" placeholder="username" required=""><br>
						<input class="form-control" type="password" name="password" placeholder="password" required=""><br>
						<input list="status" name="status" class="form-control" type="text" placeholder="STUDENT/ADMIN" required="">
  							<datalist id="status">
      							<option value="student">
						 	 	<option value="admin">
  							</datalist><br>
						
						
						<center><input class="btn .btn-success" type="submit" name="register" value="REGISTER" style="color: white; width: 95px; height: 30px;background-color: blue;" onclick="validation()"></center>
					</div>	
				</form>
			</div>	
			</center>

		</div></center>
	</section>

	<!------     storing data in database    --------->

<?php
	
	if(isset($_POST['register']))
	{
		$count=0;
		$sql="SELECT username from `register`";
		$res=mysqli_query($db,$sql);

		while($row=mysqli_fetch_assoc($res))
		{
			if($row['username']==$_POST['username'])
			{
				$count=$count+1;
			}
		}
		if($count==0)
		{
		mysqli_query($db,"INSERT INTO `register` VALUES('$_POST[first]', '$_POST[last]', '$_POST[email]', '$_POST[contact]', '$_POST[username]', '$_POST[password]', '$_POST[status]', 'u1.png');");
?>
	<script type="text/javascript">
		alert("registration successful");
	</script>

<?php
}
	else
	{
	
?>
		<script type="text/javascript">
		alert("username alrady exists");
		</script>
	
<?php
	}

	}

?>

</body>
</html>


