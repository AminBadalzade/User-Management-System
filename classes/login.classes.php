<?php 

    class Login extends Dbh {
    protected function getUser($uid, $pwd){
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_uid = ? OR users_email = ?;"); 
        
        if(!$stmt->execute(array($uid, $uid))){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("Location: ../index.php?error=usernotfound");
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;

        if (!password_verify($pwd, $user["users_pwd"])) {
            header("Location: ../index.php?error=wrongpassword");
            exit();
        }

        session_start();
        $_SESSION["userid"] = $user["users_id"];
        $_SESSION["useruid"] = $user["users_uid"];
    }
}
