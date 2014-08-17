<?php 
 
 session_start();
 
 if(isset($_SESSION['sname']))
 {
	header('location:admin.php');
 }
 
 
 include_once "config.php";
 if(isset($_POST['submit']))
 {
	@extract($_POST);
	
	$admin_login_sql=mysqli_query($con,"select email,pwd,emp_level from emp where email='$uemail' and pwd='$upwd' and emp_level='admin'");
	
	
	
	if(mysqli_num_rows($admin_login_sql)== 1)
	{
		$_SESSION['sname']=$uemail;
		
		header('location:admin.php');
	}
	else
	{
		$msg="invalid username and password";
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
		<h1>welcome Admin</h1>
		<p>please login</p>
		
		</div>
	</center>
	
		<div class="row">
		<div class="col-sm-6 col-md-4  col-md-offset-4">
		<form role="form" action="" method="post">
		  <div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" class="form-control" id="uemail" name="uemail" placeholder="Enter email" value="">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" id="upwd" name="upwd" placeholder="Password" value="">
		  </div>
		  
		  <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
		  <a class="btn btn-danger" href="password.php" role="button" style="float:right;">forgot-password</a>
		  
		  <center>
			
			<?php 
				if(isset($msg))
				{
				
				
				echo "<div class='alert alert-danger' role='alert' >".$msg."</div>";
				}
			
			
			?>
			
			
		  </center>
		</form>
		</div>
		</div>
		
		
		
		
		
		
		
		
		
		
	
	</div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>