 	<?php 
	
	include "connection.php";

		 $event_name=$start_date =$end_date =$start_time=$end_time='';

		$errors=array('event_name'=>'' , 'start_date'=>'' , 'end_date'=>'' , 'start_time'=>'' , 'end_time'=>'');

	 if(isset($_POST['submit'])){
		// echo htmlspecialchars($_POST['event_name']);
		// echo htmlspecialchars($_POST['start_date']);
		// echo htmlspecialchars($_POST['end_date']);
		// echo htmlspecialchars($_POST['start_time']);
		// echo htmlspecialchars($_POST['end_time']);
		if(empty($_POST['event_name'])){
			$errors['event_name']= '* An event name is required ';
		} else{
			$event_name=$_POST['event_name'];
			 //echo htmlspecialchars($_POST['event_name']);
			}
		

		if(empty($_POST['start_date'])){
			$errors['start_date']= '* Starting Date is required ';
		} else{
			$start_date=$_POST['start_date'];
			 //echo htmlspecialchars($_POST['start_date']);
		}

		if(empty($_POST['end_date'])){
			$errors['end_date']= '* Ending date is required ';
		} else{
			$end_date=$_POST['end_date'];
			 //echo htmlspecialchars($_POST['end_date']);
		}

		if(empty($_POST['start_time'])){
			$errors['start_time']= '* Starting Time is required ';
		} else{
			$start_time=$_POST['start_time'];
			 //echo htmlspecialchars($_POST['start_time']);
		}

		if(empty($_POST['end_time'])){
			$errors['end_time']= '* Ending time is required ';
		} else{
			$end_time=$_POST['end_time'];
			// echo htmlspecialchars($_POST['end_time']);
		}

 			if(array_filter($errors)){
		//echo 'errors in the form';
		} else{
			$event_name=mysqli_real_escape_string($conn,$_POST['event_name']);
			$start_date=mysqli_real_escape_string($conn , $_POST['start_date']);
			$end_date=mysqli_real_escape_string($conn , $_POST['end_date']);
			$start_time=mysqli_real_escape_string($conn , $_POST['start_time']);
			$end_time=mysqli_real_escape_string($conn , $_POST['end_time']);

			$sql1="INSERT INTO events(event_title,start_date,end_date,start_time,end_time) VALUES('$event_name','$start_date','$end_date','$start_time','$end_time')" ;
			// save to db and check

			if(mysqli_query($conn, $sql1)){
				//success
				header('Location:organiser.php');
			}
			else{
				echo 'query error' . mysqli_error($conn);
			}

			//echo ' form is valid';

			//header('Location:index.php');
		}

	
}  //end of POST check
	

 ?>
 	
 	<!DOCTYPE html>
 	<html>
 		<?php include "templates/header.php"; ?>

 		 <section class=" container grey-text">
		 	
		 	<h5 class="center">Event Details</h5>
		 	
		 	<form class="white" action="add.php" method="POST">
		 	<label>Event Name:</label>
		 	<input type="text" name="event_name" value=" <?php echo $event_name; ?>">
		 	<div class="red-text"><?php echo $errors['event_name']; ?></div>
		 	<label>Start Date: (DD/MM/YYYY)</label>
		 	<input type="text" name="start_date" value="<?php echo $start_date; ?>">
		 	<div class="red-text"><?php echo $errors['start_date']; ?></div>
		 	<label>End Date: (DD/MM/YYYY)</label>
		 	<input type="text" name="end_date" value="<?php echo $end_date; ?>">
		 	<div class="red-text"><?php echo $errors['end_date']; ?></div>
		 	<label>Start Time : (24-hour format)</label>
		 	<input type="text" name="start_time" value="<?php echo $start_time; ?>">
		 	<div class="red-text"><?php echo $errors['start_time']; ?></div>
		 	<label>End Time : (24-hour format)</label>
		 	<input type="text" name="end_time" value="<?php echo $end_time; ?>">
		 	<div class="red-text"><?php echo $errors['end_time']; ?></div>
		 	<div class="center">
		 		<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
		 	</div>

</form>
 </section>

 		<?php include "templates/footer.php"; ?>
 	</html>
 
 


 
 