<?php

session_start();

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

include_once "config.php";

if(isset($_POST['submit']))

{
	@extract($_POST);
	
	$mdpwd=md5($upwd);
	
	$emp_login=mysqli_query($con,"select email,pwd,emp_level from emp where email='$uemail' and pwd='$mdpwd'");
	$fet=mysqli_fetch_array($emp_login);
	
	if(mysqli_num_rows($emp_login)==1)
	{	
		$_SESSION['ename']=$uemail;
		$_SESSION['slevel']=$fet['emp_level'];
		
		if($fet['emp_level']=='manager')
		{ 
	
			if(isset($_SESSION['ename']))
			{
				header('location:manager.php');
			}
		}
		else
		{
			if(isset($_SESSION['ename']))
			{
				header('location:employee.php');
			}	
		}
	}
	else
	{
		$msg="<div class='alert alert-danger' role='alert' >"."invalid login"."</div>";
	}
	
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin | login</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
  
  <body>
    
	<div class="container">
	 <a href="index.php"  class="btn btn-info" style="float:left;">Home</a>
	<center>
		<div class="jumbotron">
		<h1>welcome employee</h1>
		<p>please login</p>
		</div>
	</center>	
		<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4">
		<form role="form" action="" method="post">
		  <div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" class="form-control" id="uemail" name="uemail" placeflotholder="Enter email">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" id="upwd" name="upwd" placeholder="Password">
		  </div>
		  
		  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
		  <a class="btn btn-danger" href="password.php" role="button" style="float:right;">forgot-password</a>
		</form>
		</div>
		</div>
		
		
		<?php
		
		if(isset($msg))
		{
			echo $msg;
		}
		
		?>
		
		
		
		
		
		
		
	
	</div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>