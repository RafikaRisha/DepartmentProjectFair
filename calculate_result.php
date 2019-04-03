<?php
session_start();
if(!$_SESSION['email'])
{
	header("location:login.php");
}
?>

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
				<a href="teacher_tech.php"><button class="btn btn-success col-sm-4">Languages</button></a>
				<a href="previous_project_list.php"><button class="btn btn-warning col-sm-4">Previous Project List</button></a>
				<a href="new-add.php"><button class="btn btn-info col-sm-4">Result</button></a>
				<a href="teacher_profile.php"><button class="btn btn-success col-sm-4">Profile</button></a>
				<a href="login.php"><button class="btn btn-warning col-sm-4">Log out</button></a>
			</aside>	

		<div id="content">
		<form action="calculate_result.php" method="POST">
		<input type="number" name="project_id" placeholder="Enter Project ID">
		<input type="submit" name="Submit" value="Submit">
		</form>
		<?php
		include_once("crud.php");
		$crud = new crud();

		if(isset($_POST['Submit']))
		{	
			$project_id = $_POST['project_id'];
			$query = "SELECT * FROM project_result WHERE project_id='$project_id'";
			$result = $crud->getData($query);
		?>
		<table border="1">
		<th> Project ID </th>
		<th> Student ID </th>
		<th> Marks </th>
		<th> Action </th>
		<?php 
		$total = 0;
		foreach ($result as $key => $res) 
		{	
			echo "<tr>";
			echo "<td>".$res['project_id']."</td>";
			echo "<td>".$res['student_id']."</td>";
			echo "<td>".$res['marks']."</td>";	
			echo "</tr>";
			$total += $res['marks']  ;
		}
		
		echo "</table>";
		echo "<td><a href='result.php?project_id=$res[project_id]&student_id=$res[student_id]&total=$total'>Total Marks</a></td>";
		// return $total;
		echo "Total: ".$total;

		}	
		?>
		
		</div>
		<div id = "footer"></div>
	</div>

</body>
</html>