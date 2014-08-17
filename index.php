<?php 

session_start();

if(isset($_SESSION['sname']))
{
	header("location:admin.php");
}
if(isset($_SESSION['ename']))
 {
	if($_SESSION['slevel']=="employee")
	{
		header('location:employee.php');
	}
	else
	{
		header('location:manager.php');
	}
	
 }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>office app</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
  </head>
  <body>
	<div class ="container">
	<center>
		<div class="jumbotron ">
		<h1> welcome to our websbite</h1>
		<h3>our work space helps u to manage all ur work efficiently </h3>
		</div>
		
		
		<div class="row">
		<div class="col-sm-6 col-md-2">
		</div>
		  <div class="col-sm-6 col-md-4">
			<div class="thumbnail">
			  <img src="img/admin.png" width="150px" height="150px" alt="...">
			  <div class="caption">
				<h3>login in for </h3>
				<p><a href="adminlogin.php" class="btn btn-primary" role="button">admin</a> </p>
			  </div>
			</div>
		  </div>
		
		
		  <div class="col-sm-6 col-md-4">
			<div class="thumbnail">
			  <img src="img/employee.jpg" width="150px" height="150px" alt="...">
			  <div class="caption">
				<h3>login for </h3>

				<p><a href="emplogin.php" class="btn btn-primary" role="button">employee</a> </p>
			  </div>
			</div>
		  </div>
		</div>
		<div class="col-sm-6 col-md-2">
		</div>
	</center>
	</div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>