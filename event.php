<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="design.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Event</title>
</head>
<body>
	<div id = "wrapper">
		<header>
			<div id = "headertop">
				<h1><center>Department Project Fair</center></h1>
			</div>
			<div id = "headermenu">
				<a href="home.php" id="home">Home</a>
				<a href="agenda.php" id="agenda">Agenda</a>
				<a href="notice.php" id="notice">Notice</a>
				<a href="about.php" id="about">About</a>
				<a href="contact.php" id="contact">Contact</a>
			</div>
		</header>

		<div id = "container">
			<aside>
				<a href="technology.php"><button class="btn btn-success col-sm-4">Languages</button></a> 
				<a href="event.php"><button class="btn btn-warning col-sm-4">Event</button></a>
				<a href="teacher_list.php"><button class="btn btn-info col-sm-4">Teachers</button></a>
				<button class="btn btn-success col-sm-4">Profile</button>
				<a href="login.php"><button class="btn btn-warning col-sm-4">Log out</button></a>
			</aside>
			<div id="content">
				<form method="POST">
					<div class="form-group">
   					<label>Event Create Date</label>
    				<input type="date" class="form-control" id="create_date" name="create_date">
  				</div>
					<div class="form-inline">
    				<label>Semester</label>
    				<input type="text" class="form-control" id="semester" name="semester" placeholder="Enter semester">
    				<label>Event Name</label>
    				<input type="text" class="form-control" id="event_name" name="event_name" placeholder="Enter Event Name">
  				</div>
  				<div class="form-group">
   					<label>Location</label>
    				<input type="text" class="form-control" id="location" name="location" placeholder="Enter Location">
  				</div>
  				<div class="form-group">
   					<label>Description</label>
    				<textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
  				</div>
  				<div class="form-inline">
   					<label>Fair Date</label>
    				<input type="date" class="form-control" id="fair_date" name="fair_date">
    				<label>Registration End Date</label>
    				<input type="date" class="form-control" id="end_date" name="end_date">
  				</div>
  			<br><button type="submit" name="submit" class="btn btn-primary">Create Event</button>
			</form>

			<?php
			include_once("crud.php");

			$crud = new crud();

			if(isset($_POST['submit'])) 
			{	
				$create_date = $crud->escape_string($_POST['create_date']);
				$semester = $crud->escape_string($_POST['semester']);
				$event_name = $crud->escape_string($_POST['event_name']);
				$location = $crud->escape_string($_POST['location']);
				$description = $crud->escape_string($_POST['description']);
				$fair_date = $crud->escape_string($_POST['fair_date']);
				$end_date = $crud->escape_string($_POST['end_date']);
			
				$result = $crud->execute("INSERT INTO event(create_date,semester,event_name,location,description,fair_date,end_date) VALUES ('$create_date','$semester','$event_name','$location','$description','$fair_date','$end_date')");
				echo "<font color='green'>Data added successfully.";
				echo "<a href='event_show.php'>View Result</a>";
			}
			?>

			</div>
				
			</div>
		</div>

		<div id = "footer"></div>
	</div>

</body>
</html>







