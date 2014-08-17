<?php 
include_once "config.php";
session_start();


if(!isset($_SESSION['sname']))
{
	header("location:adminlogin.php");
}
$s_email=$_SESSION['sname'];

$join_sql=mysqli_query($con,"SELECT emp.name,emp.phno,emp.salary,emp.department,profile.profile_pic,profile.ftype,profile.fname
                                  from emp 
								  inner join profile 
								  on emp.email='$s_email' and profile.email='$s_email'");
								  
								  

if(!$join_sql)
{
 echo "error";
}
else
{
 $fet=mysqli_fetch_array($join_sql);
 
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | admin </title>

        <link href="css/bootstrap.min.css" rel="stylesheet">

    
  </head>
  <body>
  
	<?php include_once "admin_menu.php";?>
	
	<div class ="container">
	<center>
	<div class="jumbotron" >
	 <h2>welcome <?php echo strtoupper($fet['name']);?> </h2>
	  
	</div>
	
	
	<div class="row">
		  <div class="col-sm-6  col-md-4">
			
			  <img  src="<?php if($fet['profile_pic']==NULL)
								{
								 echo "img/blank.png";
								}
								else
								{
								 
								$db_img=$fet['profile_pic'];	
								$type=$fet['ftype'];
								
									
								?>
								data:<?php echo $type;?>;base64,<?php echo base64_encode($db_img);?>
								<?php

								}
								
								
                         ?>  alt="..." width="150px" height="150px" /><br/>
			
			<a href="profile_edit.php"  class="btn btn-info">Edit profile</a>
		  </div>
		  
		  <div class="col-sm-6 col-md-offset-1 col-md-6">
		  
			<h2>NAME: <?php echo $fet['name'];?></h2><br/>
			<h4>Department: <?php echo $fet['department'];?></h4><br/>
			<h4>phno: <?php echo $fet['phno'];?></h4><br/>
			<h4>salary</h4>
			<?php 
				
				$sal=$fet['salary'];
				$sal_month=$sal/12;
				$sal_tax=$sal_month*(10/100);
				$sal_incruence=$sal_month*(2.5/100);
				$sal_others=$sal_month*(2/100);
				$sal_total=$sal_month-($sal_tax+$sal_incruence+$sal_others);
				
			?>
			<table class=" table">
			<tr>
				<td> Details</td><td>Rates</td>
			</tr>
			<tr>
				<td>salary per momth</td><td><?php echo $sal_month;?>.RS</td>
			</tr>
			<tr>
				<td>Tax</td><td><?php echo $sal_tax;?>.RS</td>
			</tr>
			<tr>
				<td>Incruence </td><td><?php echo $sal_incruence;?>.RS</td>
			</tr>
			<tr>
				<td>Other Tax</td><td><?php echo $sal_others;?>.RS</td>
			</tr>
			
			<tr>
				<td>total-salary</td><td><?php echo $sal_total;?>.RS</td>
			</tr>
			
		
		  </div>
	</div>
	
	</center>
	
	
	
	
	
	
    

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>