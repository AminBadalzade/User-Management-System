<?php 
    //Login class inherits from Dbh
    class Login extends Dbh {
    // This method tries to find a user by username or email and check the password
    protected function getUser($uid, $pwd){
        // Prepare SQL query to find user by username OR email
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_uid = ? OR users_email = ?;"); 
        
        // Execute the query with the input provided (searching both fields using the same $uid value)
        if(!$stmt->execute(array($uid, $uid))){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        // If no user was found, redirect with error
        if($stmt->rowCount() == 0){
            $stmt = null;
            header("Location: ../index.php?error=usernotfound");
            exit();
        }

        // Fetching user data as an Associative array
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;

        if (!password_verify($pwd, $user["users_pwd"])) {
            header("Location: ../index.php?error=wrongpassword");
            exit();
        }

        // If password is correct, start a session and store user info in session variables
        session_start();
        $_SESSION["userid"] = $user["users_id"];
        $_SESSION["useruid"] = $user["users_uid"];
    }
}
