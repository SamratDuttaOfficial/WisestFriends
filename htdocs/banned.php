<!DOCTYPE html>
<html lang="en">
<?php
include('dbcon.php');
include('session_banned_user.php');
?>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <title>Wisest Friends</title>
        <link rel="icon" type="image/png" href="logo.png" sizes="196x196" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-glyphicons.css" type="text/css" rel="stylesheet">
		<link href="css/font-awesome.css" type="text/css" rel="stylesheet">
        <link href="css/buttons.css" type="text/css" rel="stylesheet">
        <link href="css/navbar_css.css" type="text/css" rel="stylesheet">  
	</head>
<?php
  if($session_ban_status=="No")
    header('location:home.php');
?>  
<?
	$banned_by_userame = $session_ban_status;
?>
<center>
<h4>You have been banned from this platform.</h4>
<small>Contact the person below for more informations.</small>
<?
$query = $conn->query("select * from members where username='$banned_by_userame'");
  while($row = $query->fetch()){
  $name = $row['firstname']." ".$row['lastname'];
  $student_gender = $row['gender'];
  $student_email = $row['email'];
  $student_contact = $row['contact_no'];
  $image = str_replace(" ", '%20', $row['image']);
  ?>
	<div class="col-sm-post">
        <div class="alert-post">
                <b><?php echo $name; ?></b>
                <br>
                <small><?php echo $banned_by_username; ?>          
        </div>             
        <div class="alert-post-image"><?php echo '<center><img style="max-width:100%;max-height:200px" class="product_image" alt="No profile image available" src='.$image.'></center>'; ?>   
        </div>                         
        <div class="alert">
              <?php echo $student_gender; ?><br>
              <?php echo $student_email; ?><br>
              Contact: <?php echo $student_contact; ?></small><br>
        </div>
           
        <div>              

        </div>  
    </div>
  <?php } ?>
</center>
