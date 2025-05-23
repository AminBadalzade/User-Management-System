<?php
//SignupContr class inherits from Signup
class SignupContr extends Signup{
     // Properties to hold user input data
     private $uid;
     private $pwd;
     private $pwdRepeat;
     private $email;
    // Constructor to initialize the properties with user input
     public function __construct($uid, $pwd, $pwdRepeat, $email){
            $this->uid = $uid;
            $this->pwd = $pwd;
            $this->pwdRepeat = $pwdRepeat;
            $this->email = $email;
     }

    // Main function to handle user signup process
    public function signupUser(){

        // Checking if any input field is empty
        if($this->emptyInput() == false){
            //echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        // Validating the username format
        if($this->invalidUid() == false){
            //echo "Invalid username";
            header("location: ../index.php?error=invaliduid");
            exit();
        }        

        // Validating the email format
        if($this->invalidEmail() == false){
            //echo "Invalid email";
            header("location: ../index.php?error=invalidemail");
            exit();
        }

        // Checking if password and repeated password match
        if($this->pwdMatch() == false){
            //echo "Passwords don't match";
            header("location: ../index.php?error=pwdmatch");
            exit();
        }
         // Checking if username or email is already taken
        if($this->uidTakenCheck() == false){     
            //echo "Passwords don't match";
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }
         // If everything is good,we create the user in the database
        $this->setUser($this->uid, $this->pwd, $this->email);
     }

     // Check if any input is empty
     private function emptyInput(){
        $result;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)){
            $result = false;
        } else{
           $result = true; 
        }

        return $result;
     }

     // Validating username only contains letters and numbers
     private function invalidUid(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
            $result = false;
        } else{
            $result = true;
        }

        return $result;
     }

     // Validate email format using PHP's filter
    private function invalidEmail(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        } else{
            $result = true;
        }

        return $result;
     }

     // Check if passwords match exactly
    private function pwdMatch(){
        $result;
        if($this->pwd !== $this->pwdRepeat){
            $result = false;
        } else{
            $result = true;
        }

        return $result;
     }

     // Check if username or email already exists in the database
    private function uidTakenCheck(){
        $result;
        if(!$this->checkUser($this->uid, $this->email)){
            $result = false;
        } else{
            $result = true;
        }

        return $result;
     }
}