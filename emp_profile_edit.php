<?php 
include_once "config.php";
session_start();


if(!isset($_SESSION['ename']))
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

$semail=$_SESSION['ename'];



if(isset($_POST['submit']))
{
	$fn=$_FILES['file']['name'];
	$ft=$_FILES['file']['type'];
	$fs=$_FILES['file']['size'];
	$loc=$_FILES['file']['tmp_name'];
	
	
	 //echo $fn."<br>".$ft."<br>".$fs."<br>".$loc."<br>";
	$fo=fopen($loc,"r");
	$fr=fread($fo,filesize($loc));
	$fdata=addslashes($fr);
	 
	
	$profile_edit_sql=mysqli_query($con,"update profile set  profile_pic='$fdata',fname='$fn',ftype='$ft',fsize='$fs'  where email='$semail'");
	if(!$profile_edit_sql)
	{
		$msg="<div class='alert alert-danger' role='alert' >"."error"."</div>";
	}
	else
	{
		header("location:emplogin.php");
	}
}	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit | profile</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">

    
  </head>

	<div class="container" style="padding-top:150px;">
	<div class="jumbotron">
		<center><h2>Edit ur profile pic</h2></center>
	</div>
	<div class="row">
		  <div class="col-sm-6 col-md-offset-3 col-md-6">
			  <form action="" method="post" enctype="multipart/form-data">
			  <div class="form-group" ">
				<label for="exampleInputFile">profile pic</label>
				<input type="file" name="file">
				<p class="help-block">chose a pic.</p>
			  </div>
			  
			  <button type="submit" name="submit" value="upload" class="btn btn-info">Submit</button>
			</form>
		</div>
	</div>
	
	 <div>
		<?php
			if (isset($msg))
			{
				echo $msg;
			}
		?>
	 </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>