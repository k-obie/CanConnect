<?php

class ConsultantSignup extends Dbh{
    
    public function setUser($uid, $email, $name, $licenseNum, $address, $phone, $primProvince, $fee, $pwd){

        $stmt = $this->connect()->prepare('insert into consultant_users (user_uid, user_email, user_name, user_licenseNum, user_address, user_phone, user_primProvince, user_fee, user_pwd) values(?,?,?,?,?,?,?,?,?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        
        if(!$stmt->execute(array($uid, $email, $name, $licenseNum, $address, $phone, $primProvince, $fee, $hashedPwd)) ){
            $stmt = null;
            header("location: ../consultantPage.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;

    }
    
    
    public function checkUser($uid, $email){

        $stmt = $this->connect()->prepare('select user_uid from consultant_users where user_uid = ? or user_email = ?');

        if(!$stmt->execute(array($uid, $email)) ){
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
        
        return $result;
    }
    
    
    public function checkLicenseNum($licenseNum){
 
        $stmt = $this->connect()->prepare('select user_uid from consultant_users where user_licenseNum = ? ');

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
        
        return $result;
    }
    
}




