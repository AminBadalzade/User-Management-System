<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = "index-login-signup">
        <p>Let's create an account for our application</p>
        <form action="includes/signup.inc.php">
            <input type="text" name = "uid" placeholder = "Username">
            <input type="password" name= "pwd" placeholder="Password">
            <input type="password" name= "pwdRepeat" placeholder="Repeat Password">
            <br>
            <button type="submit" name="submit">SIGN UP</button>
        </form>
    </div>

    <div class = "index-login-signup">
    <p>LOGIN</p>
    <form action="includes/login.inc.php">
        <input type="text" name="uid" placeholder = "Username">
        <input type="password" name= "pwd" placeholder="Password">
        <br>
        <button type = "submit" name ="submit">LOGIN</button>
    </form>

    </div>
</body>
</html>