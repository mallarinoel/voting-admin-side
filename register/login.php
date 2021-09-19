<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User - Login</title>
  <link rel="icon" href="icon.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <div class="container">
    <img class="logo" src="logo.png" alt="logo" />
    <section class="form add">
      <header>
        <div class="text">
          Voters <span class="label">Login</span>
        </div>
      </header>
      <form enctype="multipart/form-data" autocomplete="off">
        <div class="notification">
          <i class="fa fa-exclamation-triangle"></i>
          <div class="error"></div>
        </div>
        <div class="form-group">
          <label for="voters_id">Voters Id</label>
          <input type="text" name="voters_id" required />
        </div>

        <div class="form-group">
          <label for="pwd">Password</label>
          <input type="password" name="pwd" required />
        </div>

        <div class="form-submit submit">
          <button type="submit" class="btn-login" name="login"><i class="fa fa-sign-in"></i>
            Login</button>
        </div>
        <p>
          Don't have an account? <a href="index.php">Click here</a>
        </p>
      </form>
    </section>
  </div>
  <script src="javascript/login.js"></script>
</body>
</html>