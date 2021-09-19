<?php
session_start();
include_once("conn.php");

$voters_id = mysqli_real_escape_string($con, $_POST['voters_id']);
$password = mysqli_real_escape_string($con, $_POST['pwd']);

if (!empty($voters_id) && !empty($password)) {
  $checkId = mysqli_query($con, "SELECT * FROM voters WHERE voters_id = '{$voters_id}'");
  if (mysqli_num_rows($checkId) > 0) {
    $checkPass = mysqli_fetch_assoc($checkId);
    if (password_verify($password, $checkPass['password'])) {
      $user = mysqli_query($con, "SELECT * FROM voters WHERE voters_id = '{$voters_id}'");
      $fetch_row = mysqli_fetch_assoc($user);
      $_SESSION['voters_id'] = $fetch_row['voters_id'];
      echo("Success"); 
    }else{
      echo("Wrong password");
    }
  } else {
    echo("Please check your Id");
  }
} elseif (empty($voters_id)) {

  echo("Please enter your voters id.");

} elseif (empty($password)) {

  echo("Please enter your password.");

} else {

  echo("Please enter your voters id & password");

}
?>