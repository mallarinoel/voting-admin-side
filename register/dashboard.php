<?php
session_start();
if (!isset($_SESSION['voters_id'])) {
  header("Location: /index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User - Dashboard</title>
  <link rel="icon" href="/icon.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="index.css" type="text/css" media="all" />
</head>
<body>
  <div class="wrapper">
    <section class="dashboard">
      <header>
        <?php
        include_once("php/conn.php");
        $sql = mysqli_query($con, "SELECT * FROM voters WHERE voters_id = {$_SESSION['voters_id']}");

        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <img src="php/photo/<?php echo $row['photo'] ?>" alt="photo" />
      </header>
      <div class="user-details">
        <div class="user-field">
          <span class="fname"><?php echo $row['firstname'] . " " . $row['lastname'] ?></span>
        </div>
        <div class="tags">
          <img src="anime.gif" alt="position" />
        </div>
        <div class="user-info">
          <span>Voters Id : <b><?php echo $row['voters_id'] ?></b></span></br>
        <span>Division : <b><?php echo $row['division'] ?></b></span>
      </div>
    </div>
      <a href="php/logout.php?voters_id=<?php echo $row['voters_id'] ?>"><i class="fa fa-sign-out"></i> Logout</a>
  </section>
</div>
</body>
</html>