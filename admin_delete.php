<?php 

session_start();

if(!isset($_SESSION['sname']))
{
	header("location:adminlogin.php");
}
?>

<?php 

 include_once "config.php";
 
 $id=$_GET['id'];
 
 $del_sql=mysqli_query($con,"delete from emp where id='$id'");
 
 if(!$del_sql)
 {
	header('location:admin_view.php?d=0');
 }
 else
 {
	header('location:admin_view.php?d=1');
 }




?>