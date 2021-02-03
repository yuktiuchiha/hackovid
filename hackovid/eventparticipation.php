
<?php
	include"connection.php";
	include"navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>participation record</title>
	<style type="text/css">
	body 
	{
		 height: 100%;
		 width: 100%; 
		 background-color: lightpink;
		 transition: background-color .5s;
	}

	.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 0;
  top: 0;
  left: 0;
  background-color: #1d1d1d;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
    margin-top: 85PX;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;

}
.sidenav a:hover {
		  color: #f1f1f1;}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.h:hover
		{
			color: white;
			width: 300px;
			height: 50px;
			background-color: #00544c;
		}
		.page
		{
			width: 70%;
			height: auto;
			background-color:#629911;
			opacity: .8;
			color: white;
			box-shadow: 2px 10px 12px black;
			margin-top: 5%;
		}
	</style>
</head>
<body>


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  						<center><div style="color: white; font-size: 20px;">
						
						<?php
							if(isset($_SESSION['login_user']))
							{
								echo "<img class='img-circle profile_img' height=100 width=100 src='images/".$_SESSION['pic']." '>";
								echo "</br></br>";
								echo" <b>".$_SESSION['login_user'];
								echo "</b>";
							}						
						?>
						</div></center> 
						<br>

    <?php
  	$q=mysqli_query($db,"SELECT * FROM `register` where username='$_SESSION[login_user]';");
  	$r=mysqli_fetch_assoc($q);
  	if($r['status']=='student')
  	{
  	?>	
  		<div class="h"><a href="profile.php">My Profile</a></div>
 		<div class="h"><a href="eventparticipation.php">My Records</a></div>	
 	<?php
 	}
 	else
 	{
 	?>	
 		<div class="h"><a href="profile.php">My Profile</a></div>
  		<div class="h"><a href="events.php">Add Events</a></div>
 		<div class="h"><a href="email.php">Create E-mail</a></div>	
 	<?php
 	}	
  ?>
  </div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "lightpink";
}
</script>



<center><div class="page">
	<h1><b><u>YOUR PARTICIPATION RECORD</u></b></h1>
	<?php	
		$q=mysqli_query($db,"SELECT * FROM `table name` where username='$_SESSION[login_user]';");
		
		if(mysqli_num_rows($q)==0)
		{
			echo"<h2><center><b>NO PARTICIPATION YET...</b></center></h2>";
		}
		else
		{
			echo"<table class ='table table-bordered table-hover'>";
			echo "<tr style='background-color: #9cb5e6;'>";
			echo"<th>"; echo"EVENT"; echo"</th>";
			echo"<th>"; echo"START DATE"; echo"</th>";
			echo"<th>"; echo"START TIME"; echo"</th>";
			echo"<th>"; echo"END DATE"; echo"</th>";
			echo"<th>"; echo"END TIME"; echo"</th>";
			echo"</tr>";
		
			while($row=mysqli_fetch_assoc($q))
			{
				echo"<tr>";
				echo "<td>"; echo $row[' ']; echo "</td>";
				echo "<td>"; echo $row[' ']; echo "</td>";
				echo "<td>"; echo $row[' ']; echo "</td>";
				echo "<td>"; echo $row[' ']; echo "</td>";
				echo "<td>"; echo $row[' ']; echo "</td>";
				echo"</tr>";
			}
			echo"</table>";	
		}
		
	?>
</div></center>	
</body>
</html>