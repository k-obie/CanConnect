<?php

class ClientEdit extends Dbh{



    
    public function editUser($userUid, $userName, $userAddr, $newPwd, $userEmail){
        session_start();
        
        $stmt = $this->connect()->prepare ("UPDATE `client_users` SET `user_uid` = ?, `user_name` = ?, `user_addr` = ?, `user_pwd` = ?, `user_email` = ? WHERE `client_users`.`user_id` = ".$_SESSION["userId"].";");

        $hashedPwd = password_hash($newPwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($userUid, $userName, $userAddr,  $hashedPwd, $userEmail)) ){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        
        $_SESSION["userUid"] = $userUid;
        
        $_SESSION["userName"] = $userName;
        $_SESSION["userAddr"] = $userAddr;
        
        $_SESSION["userPwd"] = $hashedPwd;
        $_SESSION["userEmail"] = $userEmail;


    }
    
    
    public function checkUserUID($uid){
        $result;
        
        $stmt = $this->connect()->prepare('select * from client_users where user_uid = ? ');

        if(!$stmt->execute(array($uid)) ){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0 ){
            return TRUE;
        }
        
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $userID = $user[0]["user_id"];
        $userUID = $user[0]["user_uid"];
 
 
        //To change the uid of client
        if($userID == $_SESSION["userId"] && $userUID == $_SESSION["userUid"]){
            $result = TRUE;
        }
        else{
            $result = FALSE;
        }
        
        return $result;
    }
    
    public function checkUserEmail($email){
        $result;

        $stmt = $this->connect()->prepare('select * from client_users where user_email = ? ');

        if(!$stmt->execute(array($email)) ){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0 ){
            return TRUE;
        }
        
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $userID = $user[0]["user_id"];
        $userEmail = $user[0]["user_email"];
        
        
        
        if($userID == $_SESSION["userId"] && $userEmail == $_SESSION["userEmail"]){
            $result = TRUE;
        }
        else{
            $result = FALSE;
        }
        
        return $result;
    }
    
}




