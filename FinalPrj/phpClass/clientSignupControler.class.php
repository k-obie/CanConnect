<?php


class ClientSignupControler extends ClientSignup{
    
    private $userUid;
    private $userName;
    private $userAddr;
    private $userPwd;
    private $userPwdRepeat;
    private $userEmail;
        
    
    public function __construct($userUid=null, $userName=null, $userAddr=null, $userPwd=null, $userPwdRepeat=null, $userEmail=null) {

        
        $this->userUid = $userUid;
        $this->userName = $userName;
        $this->userAddr = $userAddr;
        $this->userPwd = $userPwd;
        $this->userPwdRepeat = $userPwdRepeat;
        $this->userEmail = $userEmail;
        
    }
    
    public function signUpUser(){
        
        if($this-> emptyInput() == false ){
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        
        if($this-> isValidUserID() == false ){
            header("location: ../index.php?error=usernameLettersNumsOnly");
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
        
        if($this-> isValidAddress() == false ){
            header("location: ../index.php?error=addressLettersNumsOnly");
            exit();
        }
        
        if($this-> isSamePasswordToRepeat() == false ){
            header("location: ../index.php?error=passwordNotMatchToRepeat");
            exit();
        }
        
        if($this-> isUIDExistAlready() == false ){
            header("location: ../index.php?error=userOrEmailUsedAlready");
            exit();
        }

        $this->setUser($this->userUid, $this->userName, $this->userAddr, $this->userPwd,  $this->userEmail);
 

    }
    
    
    public function emptyInput(){
        $result;
        
        
        if(empty($this->userUid) || empty($this->userName) || empty($this->userAddr) || empty($this->userPwd) || empty($this->userPwdRepeat) || empty($this->userEmail)){
            
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
    
    public function isSamePasswordToRepeat(){
        
        $result;
        
        if($this->userPwd !==  $this-> userPwdRepeat ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    public function isUIDExistAlready(){
        
        $result;
        
        if(!$this->checkUser($this->userUid, $this->userEmail ) ){
            
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