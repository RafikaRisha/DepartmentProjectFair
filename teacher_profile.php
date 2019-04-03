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
			<form action="teacher_profile.php" method="POST">
			<input type="number" name="teacher_id" placeholder="Enter Teacher ID"><br>
			<input type="submit" name="Submit">	
			</form>
		<?php
			include_once("crud.php");
			$crud = new crud();
			if (isset($_POST['Submit'])) 
			{
				$teacher_id = $_POST['teacher_id'];
				$query = "SELECT name, email, phone FROM teacher WHERE teacher_id= '$teacher_id'";
				$result = $crud->getData($query);
		?>
			<table border="1" >
			<th> Name </th>
			<th> Email </th>
			<th> Phone </th>
			<?php
				foreach ($result as $key => $res) 
				{	
					echo "<tr>";
					echo "<td>".$res['name']."</td>";
					echo "<td>".$res['email']."</td>";
					echo "<td>".$res['phone']."</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			?>		
		
		</div>
		<div id = "footer"></div>
	</div>

</body>
</html>