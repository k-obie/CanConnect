<?php



class Dbh {
    
    public function connect(){
        try {
            $host = "127.0.0.1";
            $user = "root";
            $pass = "";
            $dbname = "dbCanConnect";
            
            
            $connection=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
            return $connection;
            
        } 
        catch (PDOException $exception) {
            
            echo "ERROR: you are nor connected to the Database.";
            $arr=$connection->errorInfo();
            echo "The driver : ".$arr[0]."<br/>";
            echo "The error code : ".$arr[1]."<br/>";
            echo "The error message : ".$arr[2]."<br/>";
            
            //
            die();
               
        }
    }
    
    
}