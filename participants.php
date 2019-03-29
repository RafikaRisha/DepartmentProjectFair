<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="background">
	<div >
	<form action="participants.php" method="POST" >
		<label>Project Proposal Submission Form</label><br><br>
		<label>Email Address</label><br>
		<input type="email" name="email" id="email" class="field" required="true"> <br/><br/>
		<label>Student ID</label><br>
		<input type="number" name="student_id" id="student_id" class="field" required="true"> <br/><br/>
		<label>Student Name</label><br>
		<input type="text" name="student_name" id="student_name" class="field" required="true"> <br/><br/>
		<label>Phone Number</label><br>
		<input type="number" name="phone" id="phone" class="field" required="true"> <br/><br/>
		<label>Select Semester</label><br>
		<select class="field" required="true" name="develop_semester">
			<option>First</option>
			<option>Second</option>
			<option>Third</option>
			<option>Fourth</option>
			<option>Fifth</option>
			<option>Sixth</option>
			<option>Seventh</option>
			<option>Eighth</option>
			<option>Ninth</option>
			<option>Tenth</option>
			<option>Eleventh</option>
		</select><br><br>
		<label>Course Code</label><br>
		<input type="text" name="course_code" id="course_code" class="field" required="true"> <br/><br/>
		<label>Category</label><br>
		<select class="field" required="true" name="category">
			<option>Web Application</option>
			<option>Desktop Application</option>
			<option>Mobile Application</option>
			<option>Hardware Application</option>
		</select><br><br>
		<label>Languages</label><br>
		<select class="field" required="true" name="language">
			<option>C</option>
			<option>ASP .NET</option>
			<option>C#</option>
			<option>PHP</option>
			<option>JAVA</option>
			<option>Other</option>	
		</select><br><br>
		<label>Project Title</label><br>
		<input type="text" name="project_title" id="project_title" class="field" required="true"> <br/><br/>
		<label>Short Description</label><br>
		<textarea id="description" class="field" name="short_description" required="true">Write here...</textarea><br><br>
		<label>Collaboration type</label><br>
		<select id="type" class="field" required="true" name="collaboration_type">
			<option>Single</option>
			<option>Group</option>
		</select><br><br>
		<label>If group then write down the IDs and Name of all members</label><br>
		<textarea id="group" class="field" required="true" name="id_name">Write here...</textarea><br><br>
		<input type="submit" name="submit" value="submit">
	</form>		
	</div>
	
</body>
</html>
<?php
	include_once("crud.php");
	$crud = new crud();
	if(isset($_POST['submit'])) 
	{	
		$email = $crud->escape_string($_POST['email']);
		$student_id = $crud->escape_string($_POST['student_id']);
		$student_name = $crud->escape_string($_POST['student_name']);
		$phone = $crud->escape_string($_POST['phone']);
		$develop_semester = $crud->escape_string($_POST['develop_semester']);
		$course_code = $crud->escape_string($_POST['course_code']);
		$category = $crud->escape_string($_POST['category']);
		$language = $crud->escape_string($_POST['language']);
		$project_title = $crud->escape_string($_POST['project_title']);
		$short_description = $crud->escape_string($_POST['short_description']);
		$collaboration_type = $crud->escape_string($_POST['collaboration_type']);
		$id_name = $crud->escape_string($_POST['id_name']);

		$result = $crud->execute("INSERT INTO participants (email,student_id,student_name,phone,develop_semester,course_code,category,language,project_title,short_description,collaboration_type,id_name) VALUES ('$email', '$student_id', '$student_name', '$phone', '$develop_semester', '$course_code', '$category', '$language', '$project_title', '$short_description', '$collaboration_type', '$id_name') ");
		
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='participant_list.php'>View Result</a>";
	}
	?>
