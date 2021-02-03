<?php
	include"connection.php";
	include"navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>message</title>
</head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body
		{
			background-color: yellow;
			background-image: url("images/15.jpg");
			background-repeat: no-repeat;		
		}
		.wrapper
		{
			height: 630px;
			width: 500px;
			background-color: black;
			opacity: .8;
			border-radius: 5px;
			padding-top: 20px;
			margin-top: 20px;
			margin-bottom: 20px; 	
		}
		.form-control
		{
			height: 45px;
			width: 73%;

		}
		.msg
		{
			height: 450px;
			overflow: scroll;
		}
		.btn-info
		{
			background-color: #02c5b6;
		}
		.chatbox
		{
			display: flex;
			flex-flow: row wrap;
		}
		.user .chatbox
		{
			height: 50px;
			width: 400px;
			padding: 13px 10px;
			color: white;
			background-color: #ffa700;
			border-radius: 10px;
			float: right;
		}
		.admin .chatbox
		{
			height: 50px;
			width: 400px;
			padding: 13px 10px;
			color: white;
			background-color: #ffa700;
			border-radius: 10px;
			float: right;
		}
	</style>
<body>

	<?php
		if(isset($_POST['submit']))
		{

			mysqli_query($db,"INSERT into `hackovid`.`queries` values('', '$_SESSION[login_user]', '$_POST[message]', 'no', 'student', 'admin');");

			$res=mysqli_query($db,"SELECT * FROM `queries` WHERE username='$_SESSION[login_user]' or receiver='$_SESSION[login_user]';");

		}
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `queries` WHERE username='$_SESSION[login_user]' or receiver='$_SESSION[login_user]' ;");
		}

  

		mysqli_query($db,"UPDATE `queries` set `seen_status`='yes' WHERE sender='admin' and `receiver`='$_SESSION[login_user]';");




	?>

	<center>
	<div class="wrapper">
		<div style="height: 70px; width: 450px; background-color: #11c502; color: white; padding-top: 2px; border-radius: 10px;">
			<h3><b>ADMIN</b></h3>
		</div>
		<br>
		<div class="msg">
			<br>

		<?php

		
				$res=mysqli_query($db,"SELECT * FROM `queries` WHERE username='$_SESSION[login_user]' or receiver='$_SESSION[login_user]' ;");	

				while($row=mysqli_fetch_assoc($res))
				{

					if($row['sender']=='student')
					{

		?>	
	<!------   student    -------->

				<div class="chat user">
						
					<div style="float: right; margin-left: 5px;" class="chatbox">
						
						<?php
							echo $row['message'];
						?>			


					</div>

				</div>
				<br><br><br>

				<?php

				}
					
				else
				{

				?>

				<!-------    admin    ------>


				<div class="chat admin">
						
					<div style="float: left; margin-left: 5px;" class="chatbox">
				
					<?php

						echo $row['message'];
					
					?>			
					
					</div>
				</div>
				<br><br><br>

				<?php
			}	
			}
		 
				?>

			
		</div>
		<div style="height: 60px; padding-top: 10px;">
			<form action="" method="post">
				<input type="text" name="message" class="form-control" required="" placeholder="write message..." style="float: left; margin-left: 7px;">
				<button class="btn btn-info btn-lg" type="submit" name="submit"><span class="glyphicon glyphicon-send"> Send</span></button>
			</form>
		</div>
	</div>
	</center>
	
</body>
</html> 