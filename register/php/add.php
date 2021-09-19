<?php
session_start();
include_once("conn.php");

$voters_id = mysqli_real_escape_string($con, $_POST['voters_id']);
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$password = mysqli_real_escape_string($con, password_hash($_POST['pwd'], PASSWORD_DEFAULT));
$division = mysqli_real_escape_string($con, $_POST['division']);

if (!empty($voters_id) && !empty($fname) && !empty($lname) && !empty($password) && !empty($division)) {
  $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
  $lowercase = preg_match('@[a-z]@', $pwd);
  $number = preg_match('@[0-9]@', $pwd);
  $specialChars = preg_match('@[^\w]@', $pwd);

  if ( !$lowercase || !$number || !$specialChars || strlen($pwd) < 8) {
    echo("Your password not valid e.g = Exampl@1.");
  } else {
    $check_id = mysqli_query($con, "SELECT * FROM voters WHERE voters_id = '$voters_id'");
    if (mysqli_num_rows($check_id) > 0) {
      echo("This voters is already exist.");
    } else {
      if (isset($_FILES['image'])) {
        $img_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);
        $img_extension = ['png',
          'jpg',
          'jpeg'];
        if (in_array($img_ext, $img_extension) === true) {
          if (move_uploaded_file($tmp_name, "photo/".$img_name)) {
            $mysql = mysqli_query($con, "INSERT INTO voters(voters_id, password, firstname, lastname, division, photo)
                                       VALUES('{$voters_id}', '{$password}', '{$fname}', '{$lname}', '{$division}', '{$img_name}')");
            if ($mysql) {
              $voters = mysqli_query($con, "SELECT * FROM voters WHERE voters_id = '{$voters_id}'");
              if (mysqli_num_rows($voters) > 0) {
                echo("Success");
              }
            } else {
              echo("Something went wrong with your query");
            }
          }
        } else {
          echo("Supported extension - .jpg .jpeg .png");
        }
      } else {
        echo("Please select an image file.");
      }
    }
  }
} else {
  echo("Please fill up the form first");
}
?>