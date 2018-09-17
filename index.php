<?php

include "config.php";

$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id ASC");
?>

<html>
<head>	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Homepage</title>
<link rel="stylesheet" href="" type="text/css" />
<script type="text/javascript"></script>
</head>

<style type="text/css">

</style>

<body>

<div class="col-md-3"></div>
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading" float = "center">Student Application</div>

<form action="add.php" method="post" name="form1">

		
		<div class="form-group">
		<tr> 
			<br/>
			<label for="name">Name</label>
			&nbsp;<td><input type="text" class="form-control" name="name" placeholder="Enter Name"></td>
		</tr>
		</div>

		<div class="form-group">
		<tr> 
			<label for="age">Age</label>
			<td><input type="text" class="form-control" name="age" placeholder="Enter Name"></td>
		</tr>
		</div>

		<div class="form-group">
		<tr> 
			<label for="email">Email</label>
			<td><input type="text" class="form-control" name="email" placeholder="Enter Email"></td>
		</tr>
		</div>

		<tr>
			<p style="text-align: center;">
			<td><a href="#" class="btn btn-warning">FIRST</a></td>
			<td>&nbsp; &nbsp;</td>
			<td><a href="#" class="btn btn-default"><<</a></td>
			<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
			<td><a href="#" class="btn btn-default">>></a></td>
			<td>&nbsp; &nbsp;</td>
			<td><a href="#" class="btn btn-warning">LAST</a></td>
			<td>&nbsp; &nbsp; &nbsp;</td>
			</p>
		</tr>
		<br/>
		<tr> 
			<p style="text-align: center; ">
			<td><input type="submit" class="btn btn-primary" name="Submit" value="&nbsp; Add &nbsp;"></td>
			<td><a class="btn btn-success" href="edit.php?id=$res[id]" role="button">&nbsp; Edit &nbsp;</a></td>
			<td><a class="btn btn-danger" href="delete.php?id=$res[id]" role="button" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
			</p>
		</tr>

</form>
</div>
</div>

	<table class="table table-bordered">
	<tr bgcolor='#346ec9'>
		<td>ID</td>
		<td>Name</td>
		<td>Age</td>
		<td>Email</td>
		<td>Update</td>
	</tr>

<?php 

	if(isset($_POST['Submit'])) {	
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
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else { 
	
			$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");

		
	}
}

	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['id']."</td>";	
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td>
		<a class=\"btn btn-success\" href=\"edit.php?id=$res[id]\" role=\"button\">Edit</a>
		<a class=\"btn btn-danger\" href=\"delete.php?id=$res[id]\" role=\"button\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
?>
</table>
</body>
</html>