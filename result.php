<?php
include_once("crud.php");

$crud = new crud();

if(isset($_POST['Save']))
{	
	$project_id = $crud->escape_string($_POST['project_id']);
	$student_id = $crud->escape_string($_POST['student_id']);
	$total = $crud->escape_string($_POST['total']);
	$result = $crud->execute("INSERT into result(project_id, student_id, total) VALUES ('$project_id', '$student_id','$total')");
	// $result = $crud->execute($query);
	header("Location: evaluation.php");	
}
?>
<form action="result.php" method="POST">
<tr>
	<td>Project ID</td>
	<td><input type="number" readonly="true" name="project_id" value="<?php echo $_GET['project_id'];?>"></td>
</tr>
<tr>
	<td>Student ID</td>
	<td><input type="number" readonly="true" name="student_id" value="<?php echo $_GET['student_id'];?>"></td>
	
</tr>
<tr>
	<td>Total Marks</td>
	<td><input type="number" readonly="true" name="total" value="<?php echo $_GET['total'];?>"></td>
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
	$total = $_GET['total'];
	$query = "SELECT student_id, project_id FROM project_result";
	$result = $crud->getData($query);
	foreach($result as $res)
	{	
		$project_id = $res['project_id'];
		$student_id = $res['student_id'];
	}
	echo "</table>";
?>	
