<!-- Login Screen -->
<?php
  //if webapp has session, redirects to menu.php
  session_start();
  if (!empty($_SESSION)){
    header('location: menu.php');
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grade Calculator PH | Home</title>
    <link rel="stylesheet" href="css/shared.css" />
    <link rel="stylesheet" href="css/home.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
    />
  </head>
  <body>
    <main>
      <section id="home-text">
        <div class="home-headers">
          <h1>The University Grade Calculator</h1>
          <h3>The Only Grade Calculator You Need.</h3>
        </div>


        <div class="about">
          <div class="about-item">
            <i class="fas fa-tablet-alt fa-4x"></i>
            <p>Store your university grades for easy access</p>
          </div>
          <div class="about-item">
            <i class="far fa-check-circle fa-4x"></i>
            <p>
              Calculate your cumulative GPA with accuracy
            </p>
          </div>
          <div class="about-item">
            <i class="fas fa-university fa-4x"></i>
            <p>Convert your GPA to other grading systems</p>
          </div>
        </div>

      </section>

      <form method = "POST">
      <section id="form">
        <div class="form-content">
          <h2>Sign In</h2>

          <?php require 'login.php';?>

          <div class="form-group">
            <label for="username">Username: </label>
            <div class="form-input">
              <input
                type="text"
                name="username"
                id="username"
                placeholder="Username"
              />
            </div>
          </div>

          <div class="form-group">
            <label for="username">Password: </label>
            <div class="form-input">
              <input
                type="password"
                name="password"
                id="password"
                placeholder="Password"
              />
            </div>
          </div>

          <button type="submit">Login</button>
        </form>

          <div class="register">
            <p>No Account? <a href="reg_page.php">Sign Up </a></p>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>
