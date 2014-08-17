<?php 

session_start();

if(!isset($_SESSION['sname']))
{
	header("location:adminlogin.php");
}
?>

<?php 
include_once "config.php";

if(isset($_POST['submit']))
{
 @extract($_POST);
 
 $pass=md5($upwd);
 
 $sign_up_sql=mysqli_query($con,"insert into emp values ('','$uname','$uemail','$pass','$gen','$uphno','$udeg','$ucity','$ulevel','$usalary','$udep')");
 $dep_sql=mysqli_query($con,"insert into profile values('','$uemail','','','','')");
 
 if(!$sign_up_sql && !dep_sql)
 {
	$msg="<div class='alert alert-danger' role='alert' >"."the values r not correct "."</div>";
 }
 else
 {
	$msg="<div class='alert alert-success' role='alert' >"."sign up was successful"."</div>";
 }
 



}



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin | signup employees</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">

    
  </head>
  <body>
		<?php include_once "admin_menu.php";?>
	<div class="container" >
	
	<div class="breadcrumb" style="text-align:center;">
		<h3>Enter new employees</h3>
	</div>
	
	
	<div class="row">
	<div class="col-sm-7 col-md-6  col-md-offset-3">
 

	<form class="form-horizontal" role="form" action="" method="post" >
	  <div class="form-group">
	  
		<label  class="col-sm-2 control-label">Name</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="uname" placeholder="name" name="uname" value=""/>
		</div>
	  </div>
	  
	  <div class="form-group">
		<label class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="uemail" placeholder="email" name="uemail" value=""/>
		</div>
	  </div>
	  
	  <div class="form-group">
		<label class="col-sm-2 control-label">Password</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control" id="upwd" name="upwd" value="" placeholder="Password"/>
		</div>
	  </div>
	  
	  
	   <div class="form-group">
		<label class="col-sm-2 control-label">Gender</label>
		<div class="radio col-sm-6">
	  		 <label>
			<input type="radio" name="gen" id="m" value="m" >Male				
		  </label>
		  <label>
			<input type="radio" name="gen" id="f" value="f" >Female				
		  </label>
		</div>
	  </div>
	  
	  
	  <div class="form-group">
		<label class="col-sm-2 control-label">Phone</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="uphno" name="uphno" value="" placeholder="Phone-no"/>
		</div>
	  </div>
	  
	  <div class="form-group">
		<label class="col-sm-2 control-label">Degree</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="udeg" name="udeg" value="" placeholder="degree"/>
		</div>
	  </div>
	  
	  <div class="form-group">
		<label class="col-sm-2 control-label">City</label>
		<div class="col-sm-10">
		  <select name="ucity" value="">
			<option value="">---select---</option>
			<option value="bangalore">bangalore</option>
			<option value="mangalore">mangalore</option>
			<option value="chenni">chenni</option>
			<option value="delhi">delhi</option>
		  </select>
		</div>
	  </div>
	  
	  <div class="form-group">
		<label class="col-sm-2 control-label">Level</label>
		<div class="col-sm-10">
		  <select name="ulevel" value="" >
			<option value="">---select---</option>
			<option value="manager">manager</option>
			<option value="employee">employee</option>
		  </select>
		</div>
	  </div>
	   <div class="form-group">
		<label class="col-sm-2 control-label">salary</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="usalary" name="usalary" value="" placeholder="salary"/>
		</div>
	  </div>
	  <div class="form-group">
		<label class="col-sm-2 control-label">Department</label>
		<div class="col-sm-10">
		  <select name="udep" value="" >
			<option value="">---select---</option>
			<option value="hr">HR</option>
			<option value="it">IT</option>
			<option value="finance">Finance</option>
			<option value="marketing">Marketing</option>
		  </select>
		</div>
	  </div>
	  
	  
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit"  name="submit" value="submit" class="btn btn-info">Sign in</button>
		</div>
	  </div>
	</form>
		
	
	
	
	</div>
	</div>
	<center>
	<?php
		if(isset($msg))
		{
			echo $msg;
		}
		
	?>
	</center>
	
	
	</div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>