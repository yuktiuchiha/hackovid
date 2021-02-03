<?php
//session_start();
	 include "connection.php";
	include"navbar.php";
	
$sql='SELECT event_title,start_date,end_date,start_time,end_time FROM events ORDER BY created_at DESC';

$result=mysqli_query($db,$sql);  	//make query and get result
	$events=mysqli_fetch_all($result,MYSQLI_ASSOC); //fetch resulting rows a
	mysqli_free_result($result); //from memory
	mysqli_close($db);
?>

<h2 class="center black-text">EVENTS!</h2>
<div class="container " >
	<div class="row">
		<?php foreach($events as $event) {?>

			<div class="col s6 md3">
				<div class="card z-depth-0">
					<div class="card-content center white-text">
						
							<h3> <?php echo 'EVENT NAME : '. htmlspecialchars($event['event_title']); ?></h3>
						
						<h4><?php echo '-> Starts on '.htmlspecialchars($event['start_date']) . '  at  ' .htmlspecialchars($event['start_time']) ; ?></h4>
						<h4><?php echo '-> Ends on '. htmlspecialchars($event['end_date'] ). ' at ' . htmlspecialchars($event['end_time']); ?></h4>
						
						<h4>No. of Participants Registered :   </h4>
					</div>
					<div class="card-action right-align">
						<?php 
							if(isset($_SESSION['login_user']))
							{
						 ?>
						<a class="brand-text1" href="regform.php"> Register for Event </a>
					<?php } 
						else {
					?>
					<a class="brand-text1" href="login.php"> Register for Event </a>
				<?php } ?>

				</div>
			</div>
		</div>
		<?php } ?>
	
</div>
</div>