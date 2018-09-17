<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Homepage</title>
<link rel="stylesheet" href="" type="text/css" />
<script type="text/javascript"></script>
<body>

</body>
</html>

<?php

	include "config.php";
	
	if(isset($_POST['update']))
	{	

		$id = mysqli_real_escape_string($mysqli, $_POST['id']);
		$name = mysqli_real_escape_string($mysqli, $_POST['name']);
		$age = mysqli_real_escape_string($mysqli, $_POST['age']);
		$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
		
		if(empty($name) || empty($age) || empty($email)) {	
				
			if(empty($name)) {
				echo "<font color='red'>Name field is empty.</font><br/>";
			}
			
			if(empty($age)) {
				echo "<font color='red'>Age field is empty.</font><br/>";
			}
			
			if(empty($email)) {
				echo "<font color='red'>Email field is empty.</font><br/>";
			}		
			} else {	
			$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
			header("Location: index.php");
		}
	}
?>

<?php

	$id = $_GET['id'];
	$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

	while($res = mysqli_fetch_array($result))
	{
		$name = $res['name'];
		$age = $res['age'];
		$email = $res['email'];
	}
?>


<style type="text/css">


</style>


<div class="col-md-3"></div>
<div class="col-md-6">
<div class="panel panel-success">
<div class="panel panel-heading">Edit
</div>


<form name="form1" method="post" action="edit.php">
	<table align="center" class="table table-hover">
	

		<div class="form-group">
		<tr> 
			<td>Name</td>
			<td><input type="text" name="name" class="form-control" value="<?php echo $name;?>"></td>
		</tr>

		<div class="form-group">
		<tr> 
			<td>Age</td>
			<td><input type="text" name="age" class="form-control" value="<?php echo $age;?>"></td>
		</tr>

		<div class="form-group">
		<tr> 
			<td>Email</td>
			<td><input type="text" name="email" class="form-control" value="<?php echo $email;?>"></td>
		</tr>

		<div class="form-group">
		<tr>
			<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
			<td><input type="submit" name="update" class="btn btn-primary" value="Update">
				<a class="btn btn-success" href="index.php">Home</a></td>
		</tr>
	</table>
</form>

