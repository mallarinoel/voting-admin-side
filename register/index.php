<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User - Registration</title>
  <link rel="icon" href="icon.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="index.css" />
</head>

<body>
  <div class="container">
    <img class="logo" src="logo.png" alt="logo" />
    <section class="form">
      <header>
        <div class="text">
          Voters <span class="label">Signup</span>
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
          <label for="fname">First Name</label>
          <input type="text" name="fname" required />
        </div>

        <div class="form-group">
          <label for="lname">Last Name</label>
          <input type="text" name="lname" required />
        </div>

        <div class="form-group">
          <label for="pwd">Password</label>
          <input onkeyup="password()" type="password" name="pwd" required />
        </div>
        <div class="indicator">
          <span class="weak"></span>
          <span class="medium"></span>
          <span class="strong"></span>
        </div>
        <div class="form-group">
          <label for="division">Choose Division</label>
          <select name="division" id="division" class="form-control" required>
            <option>-- --</option>
            <option value="HOPSD">HOPSD</option>
            <option value="NURSING ">NURSING</option>
            <option value="MEDICAL">MEDICAL</option>
            <option value="FINANCE">FINANCE</option>
          </select>
        </div>

        <div class="form-image">
          <label for="image">Photo</label>
          <input class="img" type="file" name="image" />
        </div>
        <div class="form-submit submit">
          <button type="submit" class="btn-save" name="add" ><i class="fa fa-save"></i>
            Save</button>
        </div>
        <p>
          Already have an account? <a href="login.php">Click here</a>
        </p>
      </form>
    </section>
  </div>
  <script src="javascript/index.js"></script>
</body>
</html>