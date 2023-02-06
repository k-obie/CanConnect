<?php

class ClientLogin extends Dbh{
    
    
    public function getUser($userUid, $userPwd){
    
        $stmt = $this->connect()->prepare('SELECT * FROM `client_users` WHERE `user_uid` = ? ;');

        
        if(!$stmt->execute(array($userUid)) ){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0 ){
            $stmt = null;
            header("location: ../index.php?error=userNotFound1");
            exit();
        }
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($userPwd, $result[0]["user_pwd"]);
         
        
        if($checkPwd == FALSE ){
            $stmt = null;
            header("location: ../index.php?error=wrongPassword");
            exit();
        }
        elseif ($checkPwd == TRUE){
            

            
            session_start();
            
            $_SESSION["userId"] = $result[0]["user_id"];
            $_SESSION["userUid"] = $result[0]["user_uid"];
            
            $_SESSION["userName"] = $result[0]["user_name"];
            $_SESSION["userAddr"] = $result[0]["user_addr"];

            $_SESSION["userPwd"] = $result[0]["user_pwd"];
            $_SESSION["userEmail"] = $result[0]["user_email"];
            
            
            
            $stmt = null;
        }
        
        $stmt = null;

    }
    
}




