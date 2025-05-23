<?php

class Signup extends Dbh {
    // i encrypt data using AES-256-CBC with a random initialization vector (IV)
    private function aesEncrypt($data, $key) {
        $cipher = "AES-256-CBC";
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $encrypted = openssl_encrypt($data, $cipher, $key, 0, $iv);
        return base64_encode($iv . $encrypted);
    }
    // we add a new user to the database with encrypted and hashed passwords
    protected function setUser($uid, $pwd, $email) {
        //in order to hash i use the password_hash method
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); 
        //i create an AES key by hasging the plain password
        $aesKey = hash('sha256', $pwd, true);                
        // Encryption the original password with AES for an additional layer
        $encryptedPwd = $this->aesEncrypt($pwd, $aesKey);    

        //Finally, preparing an SQL statement to insert the new user into the 'users' table
        $stmt = $this->connect()->prepare(
            "INSERT INTO users (users_uid, users_pwd, users_key, users_email) VALUES (?, ?, ?, ?);"
        );

        //trying to execute the statement
        if (!$stmt->execute([$uid, $hashedPwd, $encryptedPwd, $email])) {
            // If it fails, we close the statement and redirect with an error
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

     // Checking if a user or email already exists in the database    

    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare(
            "SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;"
        );

        // Executing the query with the provided username and email
        if (!$stmt->execute([$uid, $email])) {
            // If something goes wrong, clean up and redirect with an error
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        // Return true if no existing user/email found (meaning it's available)
        return $stmt->rowCount() === 0;
    }
}