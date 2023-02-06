<?php

class ClientSignup extends Dbh{
    
    
    
    public function setUser($userUid, $userName, $userAddr, $userPwd, $userEmail){
        
        
        $stmt = $this->connect()->prepare('INSERT INTO `client_users` ( `user_uid`, `user_name`, `user_addr`, `user_pwd`, `user_email`) VALUES ( ?, ?, ?, ?, ?);');
       
        
        $hashedPwd = password_hash($userPwd, PASSWORD_DEFAULT);
        
        if(!$stmt->execute(array($userUid, $userName, $userAddr, $hashedPwd, $userEmail)) ){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
        
    }
    
    
    public function checkUser($uid, $email){

        $stmt = $this->connect()->prepare('select user_uid from client_users where user_uid = ? or user_email = ?');

        if(!$stmt->execute(array($uid, $email)) ){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
 
        $result;
        
        if($stmt->rowCount() > 0){
            $result = FALSE;
        }
        else{
            $result = TRUE;
        }
        
        return $result;
    }
    
}




