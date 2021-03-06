<!-- Homepage -->
<?php
  //if webapp does not have session, redirects to index
  session_start();
  if (empty($_SESSION)){
    header('location: index.php');
  }
  $info = $_SESSION["info"];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grade Calculator PH | Menu</title>
    <link rel="stylesheet" href="css/shared.css" />
    <link rel="stylesheet" href="css/menu.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"/>
  </head>
  <body>
    <!-- Main-page -->
    <main id="jumbotron">
      <div class="jumbotron-text">
        <h2>Welcome, <?php echo $info[3]; ?></h2>
        <h1>University Grade Calculator</h1>
        <p>A Grade Calculator and Converter</p>
      </div>
      <div class="jumbotron-buttons">
        <a class="a-button" href=""><i class="fas fa-list-ol"></i> My Grades</a>
        <a class="a-button" href="calcu_page.html"><i class="fas fa-calculator"></i> Calculator</a>
        <a class="a-button" href="converter.html"><i class="fas fa-arrows-alt-h"></i> Converter</a>
        <a class="a-button" href="logout.php">Logout</a>
      </div>
    </main>
  </body>
</html>
