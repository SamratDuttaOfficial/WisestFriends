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
$pass1 = hash('sha384', $pass);
$pass2 = hash('sha256', $pass1);
$pass3 = hash('md5', $pass2);
$pass4 = hash('snefru', $pass3);
$pass5 = hash('crc32', $pass4);
$password = hash('sha512', $pass5);
$secret_ans1 = hash('sha256', $secret_ans);
$secret_ans2 = hash('sha384', $secret_ans1);
$secret_ans3 = hash('snefru', $secret_ans2);
$secret_ans4 = hash('md5', $secret_ans3);
$secret_ans5 = hash('sha512', $secret_ans4);
$secret_answer = hash('crc32', $secret_ans5);
 

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