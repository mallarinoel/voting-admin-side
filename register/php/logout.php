<?php
session_start();
if (isset($_SESSION['voters_id'])) {
  include_once("conn.php");
      session_unset();
      session_destroy();
      header("location: ../login.php");
} else {
  header("location: ../login.php");
}?>