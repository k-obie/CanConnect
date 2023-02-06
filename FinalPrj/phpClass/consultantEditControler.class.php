<?php

class ConsultantEditControler extends ConsultantEdit{
    
    
    private $uid;
    private $email;
    private $name;
    private $licenseNum;
    private $address;
    private $primProvince;
    private $phone;
    private $fee;
    
    private $currentPwd;
    private $newPwd;
    
    
    public function __construct($uid, $email, $name, $licenseNum, $address, $primProvince, $phone, $fee, $currentPwd, $newPwd) {
           
        $this->uid = $uid;
        $this->email = $email;
        $this->name = $name;
        $this->licenseNum = $licenseNum;
        $this->address = $address;
        $this->primProvince = $primProvince;
        $this->phone = $phone;
        $this->fee = $fee;
        
        
        $this->currentPwd = $currentPwd;
        $this->newPwd = $newPwd;


    }
    
    public function doEditUser(){

        
        if($this-> emptyInput() == false ){
            header("location: ../consultantPage.php?error=emptyinput");
            exit();
        }
        
        if($this-> isValidUserID() == false ){
            header("location: ../consultantPage.php?error=usernameBadChar");
            exit();
        }
        
        if($this-> isValidEmail() == false ){
            header("location: ../consultantPage.php?error=email");
            exit();
        }
        
        
        if($this-> isCurrentPasswordSameToAccount() == false ){
            header("location: ../consultantPage.php?error=passwordNotMatchToCurrentOneInAccount");
            exit();
        }
        
        if($this-> isUIDExistAlready() == false ){
            header("location: ../consultantPage.php?error=userOrEmailUsedAlready");
            exit();
        }
        
                
        if($this-> isValidName() == false ){
            header("location: ../consultantPage.php?error=invalidName");
            exit();
        }
        
        if($this-> isValidLicenseNumber() == false ){
            header("location: ../consultantPage.php?error=invalidLicenseNumber");
            exit();
        }
        
        
        if($this-> isValidAddress() == false ){
            header("location: ../consultantPage.php?error=invalidAddress");
            exit();
        }
        
        if($this-> isValidPhone() == false ){
            header("location: ../consultantPage.php?error=invalidPhone");
            exit();
        }
        
        if($this-> isValidProvince() == false ){
            header("location: ../consultantPage.php?error=invalidProvince");
            exit();
        }
        
        if($this-> isValidFee() == false ){
            header("location: ../consultantPage.php?error=invalidFee");
            exit();
        }
        
        if($this-> isLicenseNumExistAlready() == false ){
            header("location: ../consultantPage.php?error=invalidLicenseNumAlreadyExist");
            exit();
        }
                
        
        $this->editUser($this->uid, $this->email, $this->name, $this->licenseNum, $this->address, $this->phone,  $this->primProvince, $this->fee, $this->newPwd);
        
    }
    
    
    public function emptyInput(){
        
        $result;
        
        if(empty($this->uid) || empty($this->email) || empty($this->name) || empty($this->licenseNum) || empty($this->address) || empty($this->phone) || empty($this->primProvince) || empty($this->fee) || empty($this->currentPwd) || empty($this->newPwd)  ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
    }
    
    public function isValidUserID(){
        
        $result;
        
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    
    public function isValidEmail(){
        
        $result;
        
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    public function isValidName(){
        
        $result;
        
        if(!preg_match("/^[a-zA-Z]+\s*[a-zA-Z]*$/", $this->name) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    public function isValidLicenseNumber(){
        
        $result;
        
        if(!preg_match("/^[A-Z]\d{6}$/", $this->licenseNum) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    public function isValidAddress(){
        
        $result;
        
        if(!preg_match("/^[a-zA-Z0-9\s]*$/", $this->licenseNum) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    public function isValidPhone(){
        
        $result;
        
        if(!preg_match("/^[0-9]{10}$/", $this->phone) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    
    public function isValidProvince(){
                
        $result;
        
        $provinces = array("ON", "QC", "NS", "NB", "MB" ,"MB", "BC", "PE", "SK", "AB", "NL");
    
        $find = array_search($this->primProvince, $provinces);
 

        if(!is_numeric($find) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    
    public function isValidFee(){
        
        $result;
        
        
        if(!preg_match("/^[0-9]*$/", $this->fee)  ){
            
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
        
        if(!$this->checkUserUID($this->uid ) ){
            
            $result = FALSE;
        }
        
        if (!$this->checkUserEmail($this->email )){
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
        
    }
    
    public function isLicenseNumExistAlready(){
        
        $result;
        
        if(!$this->checkLicenseNum($this->licenseNum ) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    
}