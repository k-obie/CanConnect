<?php

class ConsultantLogin extends Dbh{
    
    
    public function getUser($uid, $pwd){
        $stmt = $this->connect()->prepare('select user_pwd from consultant_users where user_uid = ? or user_email = ?;');
        
        if(!$stmt->execute(array($uid, $uid)) ){
            $stmt = null;
            header("location: ../consultantPage.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0 ){
            $stmt = null;
            header("location: ../consultantPage.php?error=userNotFound1");
            exit();
        }
        
        $pwdHased = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHased[0]["user_pwd"]);
         
        
        if($checkPwd == FALSE ){
            $stmt = null;
            header("location: ../consultantPage.php?error=wrongPassword");
            exit();
        }
        elseif ($checkPwd == TRUE){
            $stmt = $this->connect()->prepare('select * from consultant_users where user_uid = ? or user_email = ? and user_pwd = ?;');
            
            if(!$stmt->execute(array($uid, $uid, $pwd)) ){
                $stmt = null;
                header("location: ../consultantPage.php?error=stmtfailed");
                exit();
            }
            
            if($stmt->rowCount() == 0 ){
                $stmt = null;
                header("location: ../consultantPage.php?error=userNotFound2");
                exit();
            }
            
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userId"] = $user[0]["user_id"];
            $_SESSION["userUid"] = $user[0]["user_uid"];
            $_SESSION["userEmail"] = $user[0]["user_email"];
            $_SESSION["userName"] = $user[0]["user_name"];                        
            $_SESSION["userLicenseNum"] = $user[0]["user_licenseNum"];
            $_SESSION["userAddress"] = $user[0]["user_address"];
            $_SESSION["userPrimProvince"] = $user[0]["user_primProvince"];
            $_SESSION["userPhone"] = $user[0]["user_phone"];
            $_SESSION["userFee"] = $user[0]["user_fee"];
            
            $_SESSION["userPwd"] = $user[0]["user_pwd"];
            
            $stmt = null;
        }
        
        $stmt = null;

    }
    
    
}




