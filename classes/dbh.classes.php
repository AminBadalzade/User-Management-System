<?php

class Dbh{
    // This method creates a connection to the database, i added Database username, password,
    //
    protected function connect(){
        try {
            $username = "root";
            $password = "";
            // i created a new PDO instance to connect to the MySQL database 'loginsystem' on localhost
            $dbh = new PDO('mysql:host=localhost;dbname=loginsystem',$username, $password);
            return $dbh;
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage() . "<br/>";
            die();
        }
   }

}