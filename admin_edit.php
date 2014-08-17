<?php 

 

session_start();

if(!isset($_SESSION['sname']))
{
	header("location:adminlogin.php");
}

 include_once "config.php";
 if(isset($_GET['id']))
 {
	$id=$_GET['id'];
	$f_m="";
	$f_f="";
	
	$edit_sql=mysqli_query($con,"select * from emp where id='$id'");
	if(mysqli_num_rows($edit_sql)==0)
	{
		echo "<div class='alert alert-danger' role='alert' ><center>"."no rows"."</center></div>";
	}
	else
	{
		$fet = mysqli_fetch_array($edit_sql);
	}
	
	if($fet['gen']=='m')
	{
		$f_m="checked";
	}
	else 
	{
		$f_f="checked";
	}
  }
  
  
  if(isset($_POST['submit']))
  {
	@extract ($_POST);
	$update_sql=mysqli_query($con,"update emp set name='$uname',gen='$gen',phno='$uphno',
												city='$ucity',emp_level='$ulevel',salary='$usalary',department='$udep'
												where id='$id'");

	if(!update_sql )
	{
		$msg="<div class='alert alert-danger' role='alert' ><center>"."please enter the correct value"."</center></div>";
	}
	else
	{
		header("location:admin_view.php");
	}
	
  }
  

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin |edit </title>

        <link href="css/bootstrap.min.css" rel="stylesheet">

    
  </head>
  <body>
	<?php include_once "admin_menu.php"; ?>
		<div class="container" >
	
	<div class="breadcrumb" style="text-align:center;">
		<h3>Edit employees details </h3>
	</div>
	
	
	<div class="row">
	<div class="col-sm-6 col-md-5  col-md-offset-3">
 

	<form class="form-horizontal" role="form" action="" method="post" >
	  <div class="form-group">
	  
		<label  class="col-sm-2 control-label">Name</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="uname" placeholder="name" name="uname" value="<?php echo $fet['name'];?>"/>
		</div>
	  </div>
	  
	  
	  
	   <div class="form-group">
		<label class="col-sm-2 control-label">Gender</label>
		<div class="radio col-sm-6">
	  		 <label>
			<input type="radio" name="gen" id="m" value="m" <?php echo $f_m; ?> >Male				
		  </label>
		  <label>
			<input type="radio" name="gen" id="f" value="f" <?php echo $f_f; ?> >Female				
		  </label>
		</div>
	  </div>
	  
	  
	  <div class="form-group">
		<label class="col-sm-2 control-label">Phone</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="uphno" name="uphno" value="<?php echo $fet['phno'];?>" placeholder="Phone-no"/>
		</div>
	  </div>
	  
	  <div class="form-group">
		<label class="col-sm-2 control-label">Degree</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="udeg" name="udeg" value="<?php echo $fet['deg'];?>" placeholder="degree"/>
		</div>
	  </div>
	  
	  <div class="form-group">
		<label class="col-sm-2 control-label">Salary</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="usalary" name="usalary" value="<?php echo $fet['salary'];?>" placeholder="degree"/>
		</div>
	  </div>
	  
	  <div class="form-group">
		<label class="col-sm-2 control-label">City</label>
		<div class="col-sm-10">
		  <select name="ucity" value="" >
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
	  
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit"  name="submit" value="submit" class="btn btn-info">update</button>
		</div>
	  </div>
	</form>
	</div>
	</div>
    
	
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>