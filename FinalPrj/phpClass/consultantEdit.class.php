<?php

class ConsultantEdit extends Dbh{
    

    public function editUser($uid, $email, $name, $licenseNum, $address, $phone, $primProvince, $fee, $newPwd){

        $stmt = $this->connect()->prepare ("UPDATE `consultant_users` SET `user_uid` = ?, `user_email` = ?, `user_name` = ?, `user_licenseNum` = ?, `user_address` = ?, `user_phone` = ?, `user_primProvince` = ?, `user_fee` = ?, `user_pwd` = ? WHERE `consultant_users`.`user_id` =  ".$_SESSION["userId"].";");
        
        $hashedPwd = password_hash($newPwd, PASSWORD_DEFAULT);
      

        if(!$stmt->execute(array($uid, $email, $name, $licenseNum, $address, $phone, $primProvince, $fee, $hashedPwd)) ){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
        
        session_start();
        $_SESSION["userUid"] = $uid;
        $_SESSION["userEmail"] = $email;     
        

        $_SESSION["userName"] = $name;
        $_SESSION["userLicenseNum"] = $licenseNum;
        $_SESSION["userAddress"] = $address;
        $_SESSION["userPrimProvince"] = $primProvince;
        $_SESSION["userPhone"] = $phone;
        $_SESSION["userFee"] = $fee;
        
        $_SESSION["userPwd"] = $hashedPwd;
     
    }
    
    
    public function checkUserUID($uid){
        $result;
        
        $stmt = $this->connect()->prepare('select * from consultant_users where user_uid = ? ');
        //
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
        

        $stmt = $this->connect()->prepare('select * from consultant_users where user_email = ? ');
        //
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
    
    
    public function checkLicenseNum($licenseNum){

        $stmt = $this->connect()->prepare('select * from consultant_users where user_licenseNum = ? ');
        //
        if(!$stmt->execute(array($licenseNum)) ){
            $stmt = null;
            header("location: ../consultantPage.php?error=stmtfailed");
            exit();
        }
        
        $result;
        
        if($stmt->rowCount() > 0){
            $result = FALSE;
        }
        else{
            $result = TRUE;
        }
        
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $licenseNum = $user[0]["user_licenseNum"];
        
        if($licenseNum == $_SESSION["userLicenseNum"]){
            $result = TRUE;
        }
        
        return $result;
    }
    
}




