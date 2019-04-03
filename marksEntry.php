<?php
session_start();
if(!$_SESSION['email'])
{
	header("location:login.php");
}
?>

<?php
include_once("crud.php");

$crud = new crud();

if(isset($_POST['Save']))
{	
	$project_id = $crud->escape_string($_POST['project_id']);
	$student_id = $crud->escape_string($_POST['student_id']);
	$marks = $crud->escape_string($_POST['marks']);
	$result = $crud->execute("INSERT into project_result(project_id, student_id, marks) VALUES ('$project_id', '$student_id','$marks')");
	// $result = $crud->execute($query);
	header("Location: update.php");	
}
?>
<form action="marksEntry.php" method="POST">
		
<table border="0">
<tr> 
	<td>Project ID</td>		
	<td><input type="number" readonly="true" name="project_id" value="<?php echo  $_GET['project_id'];?>"></td>
</tr>
<tr> 
	<td>Student ID</td>		
	<td><input type="number" readonly="true" name="student_id" value="<?php echo $_GET['student_id'];?>"></td>
</tr>
<tr> 
	<td>Marks</td>		
	<td><input type="number" name="marks" value="<?php echo $marks;?>"></td>
</tr>
<tr>
	<td><input type="hidden" name="project_id" value="<?php echo $_GET['project_id'];?>"></td>
	<td><input type="submit" name="Save" value="Save"></td>
</tr>		
</table>
</form>
<?php
	$project_id = $crud->escape_string($_GET['project_id']);
	$student_id = $crud->escape_string($_GET['student_id']);
	$query = "SELECT student_id, project_id FROM participants";
	$result = $crud->getData($query);
	foreach($result as $res)
	{	
		$project_id = $res['project_id'];
		$student_id = $res['student_id'];
	}
	echo "</table>";
?>		

