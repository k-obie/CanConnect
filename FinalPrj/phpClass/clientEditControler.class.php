<?php

class ClientEditControler extends ClientEdit{
    
    private $userUid;
    private $userName;
    private $userAddr;
    private $userEmail;
    private $currentPwd;
    private $newPwd;

    
    
    public function __construct($userUid=null, $userName=null, $userAddr=null, $userEmail=null, $currentPwd=null, $newPwd=null) {
        
        $this->userUid = $userUid;
        $this->userName = $userName;
        $this->userAddr = $userAddr;
        $this->userEmail = $userEmail;
        $this->currentPwd = $currentPwd;
        $this->newPwd = $newPwd;
       
    }
    
    public function doEditUser(){
        
        if($this-> emptyInput() == false ){
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        
        if($this-> isValidUserID() == false ){
            header("location: ../index.php?error=usernameLettersNumsOnly");
            exit();
        }
        if($this-> isValidAddress() == false ){
            header("location: ../index.php?error=addressLettersNumsOnly");
            exit();
        }
        
        if($this-> isValidEmail() == false ){
            header("location: ../index.php?error=email");
            exit();
        }
        if($this-> isValidName() == false ){
            header("location: ../index.php?error=NameOnlyCharAndSpace");
            exit();
        }
        
        if($this-> isCurrentPasswordSameToAccount() == false ){
            header("location: ../index.php?error=passwordNotMatchToCurrent");
            exit();
        }
        
        if($this-> isUIDExistAlready() == false ){
            header("location: ../index.php?error=userOrEmailUsedAlready");
            exit();
        }

        $this->editUser($this->userUid, $this->userName, $this->userAddr, $this->newPwd, $this->userEmail);
        
        
        
    }
    
    
    public function emptyInput(){
        $result;

        if(empty($this->userUid) || empty($this->userName) || empty($this->userAddr) || empty($this->userEmail) || empty($this->currentPwd) || empty($this->newPwd) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
    }
    
    public function isValidUserID(){
        
        $result;
        
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->userUid) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    
    public function isValidEmail(){
        
        $result;
        
        if(!filter_var($this->userEmail, FILTER_VALIDATE_EMAIL) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    public function isCurrentPasswordSameToAccount(){
        
        session_start();
        
        $checkPwd = password_verify($this->currentPwd, $_SESSION["userPwd"]);
                        
        $result;
        
        if(!$checkPwd ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    public function isUIDExistAlready(){
        
        $result;
        
        if(!$this->checkUserUID($this->userUid ) ){
            
            $result = FALSE;
        }
        
        if (!$this->checkUserEmail($this->userEmail )){
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    
    public function isValidName(){
        
        $result;
        
        if(!preg_match("/^[a-zA-Z]+\s*[a-zA-Z]*$/", $this->userName) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    public function isValidAddress(){
        
        $result;
        
        if(!preg_match("/^[a-zA-Z0-9\s]*$/", $this->userAddr) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
}