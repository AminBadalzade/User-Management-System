<?php

class Signup extends Dbh {

    private function aesEncrypt($data, $key) {
        $cipher = "AES-256-CBC";
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $encrypted = openssl_encrypt($data, $cipher, $key, 0, $iv);
        return base64_encode($iv . $encrypted);
    }

    protected function setUser($uid, $pwd, $email) {
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); 
        $aesKey = hash('sha256', $pwd, true);                
        $encryptedPwd = $this->aesEncrypt($pwd, $aesKey);    

        $stmt = $this->connect()->prepare(
            "INSERT INTO users (users_uid, users_pwd, users_key, users_email) VALUES (?, ?, ?, ?);"
        );

        if (!$stmt->execute([$uid, $hashedPwd, $encryptedPwd, $email])) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare(
            "SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;"
        );

        if (!$stmt->execute([$uid, $email])) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        return $stmt->rowCount() === 0;
    }
}