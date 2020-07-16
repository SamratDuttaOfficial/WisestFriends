<?php
require_once("dbcon.php");


if(!empty($_POST["username"])) {
  $result = $conn->query("SELECT count(*) FROM members WHERE username='" . $_POST["username"] . "'");
  $row = $result->fetch();
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}
?>