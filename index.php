<?php include_once "session.config.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      // Checking if a user session exists (user is logged in)
      if(isset($_SESSION["userid"])){
      ?>
      <!-- I show username and a logout link if logged in -->
        <a href="#"><?php echo $_SESSION["useruid"]; ?></a>
        <a href="logout.php">LOGOUT</a>
      <?php 
        } else {
      ?>
      <!-- I show signup and login links if not logged in -->
      <a href="#">SIGN UP</a>
      <a href="#">LOGIN</a>
      <?php 
        }
      ?>
    </div>
  </header>

    <main>
      <!-- Signup form -->
    <div class = "index-login-signup">
        <p>Let's create an account for our application</p>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name = "uid" placeholder = "Username" required>
            <input type="password" name= "pwd" placeholder="Password" required>
            <input type="password" name= "pwdRepeat" placeholder="Repeat Password" required>
            <input type="text" name="email" placeholder = "E-Mail" required>
            <br>
            <button type="submit" name="submit">SIGN UP</button>
        </form>
    </div>
      <!-- Login form -->
    <div class = "index-login-signup">
    <p>LOGIN</p>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder = "Username" autocomplete="username" required>
        <input type="password" name= "pwd" placeholder="Password" autocomplete="current-password" required>
        <br>
        <button type = "submit" name ="submit">LOGIN</button>
    </form>

    </div>
    </main>
    
</body>
</html>