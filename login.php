<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="b_img">
	<div >
	<form action="login.php" method="POST" >
		<input type="email" name="email" id="email" placeholder="Enter Your Email" class="field" required="true"> <br/><br/>
		<input type="password" name="password" id="password" placeholder="Enter Your Password" class="field" required="true"> <br/><br/>
		<input type="submit" name="submit" value="Submit" class="field">
	</div>
	</form>
</body>
</html>

<?php
include_once("config.php");
if(isset($_POST["submit"]))
{
	$email=$_SESSION['email']=$_POST['email'];
	$password=$_POST['password'];

	$result_admin=mysqli_query($con,"SELECT * FROM user WHERE email='$email' AND password='$password'");
	$result_teacher=mysqli_query($con,"SELECT * FROM teacher WHERE email='$email' AND password='$password'");
	$result_student=mysqli_query($con,"SELECT * FROM student WHERE email='$email' AND password='$password'");
	if(mysqli_num_rows($result_admin)>0)
	{
		while($row=mysqli_fetch_assoc($result_admin))
		{
			header("location:admin_home.php");
		}
	}
	if(mysqli_num_rows($result_teacher)>0)
	{
		while($row=mysqli_fetch_assoc($result_teacher))
		{
			header("location:teacher_home.php");
		}
	}
	if(mysqli_num_rows($result_student)>0)
	{
		while($row=mysqli_fetch_assoc($result_student))
		{
			header("location:student_home.php");
		}
	}
	else
	{
		echo "Error!";
	}
}
?>