<?php ob_start(); ?>
<?php include('index_header.php'); ?>
<?php
include('dbcon.php');
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-.]/', '', $string); // Removes special chars.

   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

$username = clean(htmlspecialchars($_POST['name']));
$gradyear = htmlspecialchars($_POST['gradyear']);
$collegecode = htmlspecialchars($_POST['collegecode']);
$secret_info = htmlspecialchars($_POST['secret_info']);
$secret_ans = htmlspecialchars($_POST['secret_answer']);
$pass = htmlspecialchars($_POST['password']);
$password = hash('sha256', $pass);
$secret_answer = hash('sha512', $secret_anss);
 

$query = $conn->query("update members set password = '$password' where gradyear = '$gradyear' and username='$username' and collegecode='$collegecode' and secret_info='$secret_info' and secret_answer='$secret_answer' ");

$count = $query->rowcount();
$row = $query->fetch();
if ($count == 0){
	echo "<h4><font color='white'>You have entered wrong info about yourself. Try again with the correct info.</text></h4>
            <button onclick='goBack()' type='button' class='btn btn-primary active'> Go Back </button> 
            <script>
            function goBack() {
            window.history.back();
            }
            </script>";
}else{
	echo "<h4><font color='white'>Password reset SUCCESSFUL</text></h4>
            <button onclick='goLogin()' type='button' class='btn btn-primary active'> Go Login </button>"; 
}
?>
<script>
            function goLogin() {
            window.location = 'index.php';
            }
</script>
