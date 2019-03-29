<?php
include_once("crud.php");

$crud = new crud();

if(isset($_POST['update']))
{	
	// $project_id = $crud->escape_string($_POST['project_id']);
	$add_prize = $crud->escape_string($_POST['add_prize']);
	$result = $crud->execute("UPDATE participants SET add_prize='$add_prize' WHERE project_id='$project_id'");
	// $result = $crud->execute($query);
	header("Location: evaluation.php");	
}
?>

<?php	
$project_id = $crud->escape_string($_GET['project_id']);
$query = "SELECT project_id, add_prize FROM  participants WHERE project_id='$project_id'";
$result = $crud->getData($query);
foreach ($result as $res) 
{	
	$add_prize = $res['add_prize'];
	$project_id = $res['project_id'];
}
?>
<form action="update.php" method="post">
		
<table border="0">
<tr> 
	<td>Add Prize</td>		
	<td><input type="number" name="add_prize" value="<?php echo $add_prize;?>"></td>
</tr>
<tr>
	<td><input type="hidden" name="project_id" value=<?php echo $_GET['project_id'];?>></td>
	<td><input type="submit" name="update" value="Update"></td>
</tr>		
</table>
</form>
		

