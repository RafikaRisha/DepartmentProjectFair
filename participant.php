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

	<title>Student</title>
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
				<a href="participants.php"><button class="btn btn-success col-sm-4">Participant</button></a>
				<button class="btn btn-warning col-sm-4">Visitor</button>
				<a href="previous_project_list.php"><button class="btn btn-info col-sm-4">Previous Project List</button></a> 
				<button class="btn btn-success col-sm-4">Result</button>
				<a href="logout.php"><button class="btn btn-warning col-sm-4">Log out</button></a> 
			</aside>
		<div id="content">
			<?php
			include_once("crud.php");
			$crud = new crud();
			$query = "SELECT * FROM event ORDER BY event_id DESC LIMIT 1";
			$result = $crud->getData($query);
			?>
			<table border="1" >
			<th> Event Create Date </th>
			<th> Semester </th>
			<th> Event Name </th>
			<th> Location </th>
			<th> Description </th>
			<th> Fair Date </th>
			<th> Registration End Date </th>
			<?php
				foreach ($result as $key => $res) 
				{	
					echo "<tr>";
					echo "<td>".$res['create_date']."</td>";
					echo "<td>".$res['semester']."</td>";
					echo "<td>".$res['event_name']."</td>";
					echo "<td>".$res['location']."</td>";
					echo "<td>".$res['description']."</td>";
					echo "<td>".$res['fair_date']."</td>";
					echo "<td>".$res['end_date']."</td>";
					echo "</tr>";
				}
				echo "</table>";
				?>
				
				<?php
					$query = "SELECT end_date FROM event ORDER BY event_id DESC LIMIT 1";
				echo "Reg Deadline : ";
					foreach ($result as $key => $res) 
					{
						echo $res['end_date'];
					}
					echo "</br>";
				?>
				<a href="participants.php"><button type="button" id="btnSubmit">Registration Here</button></a>
			
			<script type="text/javascript">
				var end = "<?php
				foreach ($result as $key => $res) 
					{
						echo $res['end_date'];
					}
				?>";
				var dt = new Date();
				var month = dt.getMonth()+1;
				var date = dt.getDate();
				var year = dt.getFullYear();
				var current = [year+"-"+"0"+month+"-"+date];
				 document.write(current);				
				// var logic = end + 1;

				// var dt = new Date();
				// var month = dt.getMonth()+1;
				// var current = dt.getFullYear() +"-"+ month +"-"+ dt.getDate();
				// document.write(logic);
				if(end < current)
				{
					$(document).ready(function()
					{
            			$('#btnSubmit').each(function() 
						{
    						$(this).prop("disabled",true);
						});
          			});
				}
				else if(end > current)
				{
					$(document).ready(function()
					{
    	     			$('#btnSubmit').each(function() 
				 		{
     						$(this).prop("disabled",false);
				 		});
    	      		});	
				}

			</script>
		</div>

		<div id = "footer"></div>
	</div>

</body>
</html>