<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="design.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<!-- <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Evaluation</title>
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
				<button class="btn btn-success col-sm-4">Languages</button>
				<button class="btn btn-warning col-sm-4">Previous Project List</button>
				<button class="btn btn-info col-sm-4">Result</button>
				<button class="btn btn-success col-sm-4">Profile</button>
				<a href="login.php"><button class="btn btn-warning col-sm-4">Log out</button></a>
			</aside>	

		<div id="content">
		<?php
		include_once("crud.php");
		$crud = new crud();

		$query = "SELECT event.event_id, participants.student_id, participants.project_id, participants.project_title, participants.category, participants.language, participants.add_prize FROM event INNER JOIN participants WHERE event.event_id=participants.event_id AND participants.event_id = 1";
		$result = $crud->getData($query);
		?>
		<table border="1">
		<th> Student ID </th>
		<th> Project Title </th>
		<th> Category </th>
		<th> Language </th>
		<th> Prize </th>
		<th> Update </th>
		<?php 
		foreach ($result as $key => $res) 
		{	
			echo "<tr>";
			echo "<td>".$res['student_id']."</td>";
			echo "<td>".$res['project_title']."</td>";
			echo "<td>".$res['category']."</td>";
			echo "<td>".$res['language']."</td>";
			echo "<td>".$res['add_prize']."</td>";
			echo "<td><a href=\"update.php?project_id=$res[project_id]\">Edit</a></td>";
			echo "</tr>";
		}
		echo "</table>";
		?>
		
		</div>
		<div id = "footer"></div>
	</div>

</body>
</html>