<?php 

session_start();

if(!isset($_SESSION['sname']))
{
	header("location:adminlogin.php");
}
?>

<?php

include_once "config.php";




?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin | view</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">

    
  </head>
  <body>
  
  
    <?php include_once "admin_menu.php";?>
	
	
	<div class="container" >
		<table class="table table-bordered">
		 <tr>
			<th>Name</th><th>Email</th><th>Gender</th><th>Phone</th><th>Degree</th><th>City</th><th>level</th><th>salary</th><th>department</th><th>Edit</th><th>Delete</th>
		 </tr>
		 <?php 
			$view_sql=mysqli_query($con," select * from emp where id<>'1'");
			
			
			if (mysqli_num_rows($view_sql)== 0)
			{
				echo "<tr><th colspan=11><div class='alert alert-danger' role='alert' ><center>"."no rows"."</center></div></th></tr>";
			}
 		 
			while($fetch=mysqli_fetch_array($view_sql))
			
			{
			?>
			<tr>
				<td><?php echo $fetch['name'];?></td>
				<td><?php echo $fetch['email'];?></td>
				<td><?php echo $fetch['gen'];?></td>
				<td><?php echo $fetch['phno'];?></td>
				<td><?php echo $fetch['deg'];?></td>
				<td><?php echo $fetch['city'];?></td>
				<td><?php echo $fetch['emp_level'];?></td>
				<td><?php echo $fetch['salary'];?></td>
				<td><?php echo $fetch['department'];?></td>
				
				
				<th> <a href="admin_edit.php?id=<?php echo $fetch['id'];?>" >Edit</a> </th>
				<th> <a href="admin_delete.php?id=<?php echo $fetch['id'];?>" onclick="return del()" >Delete</a> </th>
			</tr>
			
			
			<?php
			}
		 
		 
		 
		 ?>
		 
		 
		</table>
	
	<center>
		<?php
		 if(isset($_GET['d']))
		 {
		 $del_msg=$_GET['d'];
		 
		 if($del_msg==0)
		 {
			echo "<div class='alert alert-danger' role='alert' >"." record cannot be deleted"."</div>";
		 }
		else 
		{
			echo "<div class='alert alert-success' role='alert' >"." record deleted"."</div>";
		}
		}
		?>
	</center>
	</div>
   
    

    <script>
			function del()
			{
				var a=confirm("Are your sure?");
				if(a==true)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>