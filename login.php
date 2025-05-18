<?php include_once "session.config.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
  <header>
    <div>
      <h4>Amin Badalzade</h4>
      <nav>
        <a href="#">HOME</a>
        <a href="#">ABOUT</a>
        <a href="#">SERVICES</a>
        <a href="#">CONTACT US</a>
      </nav>
    </div>

    <div>
      <?php 
      if(isset($_SESSION["userid"])){
      ?>
        <a href="#"><?php echo $_SESSION["useruid"]; ?></a>
        <a href="logout.php">LOGOUT</a>
      <?php 
        } else {
      ?>
      <a href="#">SIGN UP</a>
      <a href="#">LOGIN</a>
      <?php 
        }


      ?>
    </div>
  </header>
  <main>
<p style="
  font-size: 1.25rem;
  color: #ffffff;               /* White text for contrast */
  background-color: #007BFF;    /* Deep blue background */
  padding: 1rem 1.5rem;
  border-radius: 0.5rem;
  border: 1px solid #3b82f6;    /* Lighter blue border for accent */
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  text-align: center;
  max-width: 600px;
  margin: 2rem auto;
">
  You have successfully logged into our website.
</p>
  </main>
