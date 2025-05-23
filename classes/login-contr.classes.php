<?php

class loginContr extends Login{
     private $uid;
     private $pwd;
     private $pwdRepeat;
     private $email;

     public function __construct($uid, $pwd){
            $this->uid = $uid;
            $this->pwd = $pwd;

     }

    // Main method to handle the login process
    public function loginUser(){
        if($this->emptyInput() == false){
            //echo "Empty input!";
            // going back with an error if inputs are missing
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        
        // If inputs are valid, attempt to get user and verify password
        $this->getUser($this->uid, $this->pwd);
     }

     // Helper method to check if input fields are empty
     private function emptyInput(){
        $result;
        if(empty($this->uid) || empty($this->pwd) ){
            $result = false;
        } else{
           $result = true; 
        }

        return $result;
     }
}