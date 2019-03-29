<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="home.css">
	<script type="text/javascript" src="boostrap/js/boostrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
	<title>Home</title>
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
				<a  href="teacher_reg.php"><button class="btn btn-success col-sm-4">Teacher</button></a>
				<a  href="student_reg.php"><button class="btn btn-warning col-sm-4">Student</button></a>
			</aside>
			<div id="content">
				<div id="demo" class="carousel slide" data-ride="carousel">

				<!-- The slideshow -->
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="Images/Pic2.jpg" alt="photo1" width="100%" height="auto">
					</div>
					<div class="carousel-item">
						<img src="Images/Pic1.jpg" alt="photo2"  width="100%" height="auto">
					</div>
					<div class="carousel-item">
						<img src="Images/Pic3.jpg" alt="photo3"  width="100%" height="auto">
					</div>
				</div>
  
				<!-- Left and right controls -->
				<a class="carousel-control-prev" href="#demo" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#demo" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>

			</div>
		</div>

		<div id = "footer"></div>
	</div>

</body>
</html>

