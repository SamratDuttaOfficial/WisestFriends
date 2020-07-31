<?php ob_start(); ?>
<?php include('index_header.php'); ?>
<?php
include('dbcon.php');

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-.]/', '', $string); // Removes special chars.

   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

$username = clean(htmlspecialchars($_POST['username']));
$pass = htmlspecialchars($_POST['password']);
$password = hash('sha256', $pass);
$query = $conn->query("select * from members where username = '$username' and password = '$password'");
$count = $query->rowcount();
$row = $query->fetch();
if ($count > 0){
session_start();
$_SESSION['id'] = $row['member_id'];
 header('location:home.php'); 
}else{
 	echo "<h4><font color='white'>Wrong Credentials.</font></h4>";
	echo "<button onclick='goBack()' type='button' class='btn btn-primary active'> Go Back </button>"; 
    echo "<script>";
    echo "function goBack() {";
    echo "window.location ='index.php'";
    echo "}";
    echo "</script>"; 
}
?>
