<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="b_img">

	<script type="text/javascript">
		function validate() 
		{
			if (document.form.email.value == '') 
			{
				alert('Please provide your email');
				document.form.email.focus();
				return false;
			}
			return true;
		}
	</script>	

	<div >
	<form action="teacher_reg.php" method="POST" >
		<input type="text" name="name" id="name" placeholder="Enter Your Name" class="field" required="true"> <br/><br/>
		<input type="email" name="email" id="email" placeholder="Enter Your Email" class="field" required="true"> <br/><br/>
		<input type="number" name="phone" id="phone" placeholder="Enter Your Phone Number" class="field" required="true"> <br/><br/>
		<input type="password" name="password" id="password" placeholder="Enter Your Password" class="field" required="true"> <br/><br/>
		<input type="submit" name="submit" value="Submit" class="field">
	</div>
	</form>
</body>
</html>

<?php
include_once("crud.php");
include_once("validation.php");

$crud = new crud();
$validation = new validation();

if(isset($_POST['submit'])) {	
	$name = $crud->escape_string($_POST['name']);
	$email = $crud->escape_string($_POST['email']);
	$phone = $crud->escape_string($_POST['phone']);
	$password = $crud->escape_string($_POST['password']);
		
	$msg = $validation->check_empty($_POST, array('name', 'email', 'phone', 'password'));
	$check_email = $validation->is_email_valid($_POST['email']);
	
	if($msg != null) 
	{
		echo $msg;		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} 
	elseif (!$check_email) 
	{
		echo 'Please provide proper email.';
	}	
	else 
	{ 	
		$result = $crud->execute("INSERT INTO teacher(name,email,phone,password) VALUES('$name','$email','$phone','$password')");
		echo "<font color='green'>Data added successfully.";
		// echo "<br/><a href='#'>View Result</a>";
	}
}
?>