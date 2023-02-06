<?php


class ConsultantSignupControler extends ConsultantSignup{
    

    
    private $userUid;
    private $userEmail;
    private $userName;
    private $userLicenseNum;
    private $userAddress;
    private $userPhone;
    private $userPrimProvince;
    private $userFee;
    
    private $userPwd;
    private $userPwdRepeat;

    
    
    public function __construct($userUid=null, $userEmail=null, $userName=null, $userLicenseNum=null, $userAddress=null, $userPhone=null, $userPrimProvince=null, $userFee=null, $userPwd=null, $userPwdRepeat=null ) {
 
        
        $this->userUid = $userUid;
        $this->userEmail = $userEmail;
        $this->userName = $userName;
        $this->userLicenseNum = $userLicenseNum;
        $this->userAddress = $userAddress;
        $this->userPhone = $userPhone;
        $this->userPrimProvince = $userPrimProvince;
        $this->userFee = $userFee;        
        
        $this->userPwd = $userPwd;
        $this->userPwdRepeat = $userPwdRepeat;


    }
    
    public function signUpUser(){


        
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
        
        
        if($this-> isSamePasswordToRepeat() == false ){
            header("location: ../consultantPage.php?error=passwordNotMatchToRepeat");
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
        
        $this->setUser(
                $this->userUid,
                $this->userEmail,
                $this->userName,
                $this->userLicenseNum,
                $this->userAddress,
                $this->userPhone,
                $this->userPrimProvince,
                $this->userFee,           
                $this->userPwd);
        
        

    }
    
    
    public function emptyInput(){
        $result;

        
        if(empty($this->userUid) || empty($this->userEmail) || empty($this->userName) || empty($this->userLicenseNum) || empty($this->userAddress) || empty($this->userPhone) || empty($this->userPrimProvince) || empty($this->userFee) || empty($this->userPwd) || empty($this->userPwdRepeat)  ){
            
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
    
    public function isValidLicenseNumber(){
        
        $result;
        
        if(!preg_match("/^[A-Z]\d{6}$/", $this->userLicenseNum) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    public function isValidAddress(){
        
        $result;
        if(!preg_match("/^[a-zA-Z0-9\s]*$/", $this->userAddress) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    public function isValidPhone(){
        
        $result;
        
        if(!preg_match("/^[0-9]{10}$/", $this->userPhone) ){
            
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
        
        $index = array_search($this->userPrimProvince, $provinces);
        
        if(!is_numeric($index) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    
    public function isValidFee(){
        
        $result;
        
        
        if(!preg_match("/^[0-9]*$/", $this->userFee)  ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    
    
    public function isSamePasswordToRepeat(){
        
        $result;
        
        if($this->userPwd !==  $this->userPwdRepeat ){
            
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
    
    public function isLicenseNumExistAlready(){
        
        $result;
        
        if(!$this->checkLicenseNum($this->userLicenseNum ) ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
        
    }
    
    
}