<?php

if(isset($_POST["submit"]))
{

    
    //Client
    $userUid = $_POST["userUid"];    
    $userName = $_POST["userName"];
    $userAddr = $_POST["userAddr"];
    $userPwd = $_POST["userPwd"];   
    $userPwdRepeat = $_POST["userPwdRepeat"];
    $userEmail = $_POST["userEmail"];
    
    
    include '../phpClass/dbconfig.php';
    include '../phpClass/dbh.class.php';
    include '../phpClass/clientSignup.class.php';
    include '../phpClass/clientSignupControler.class.php';
    

    
        
    $signup = new ClientSignupControler($userUid, $userName, $userAddr, $userPwd, $userPwdRepeat, $userEmail);
    
    //
    $signup->signUpUser();
    
    // 
    header("location: ../index.php?error=none");
    
    
}

if(isset($_POST["submitCon"]))
{
    //Consultant

    $userUid = $_POST["userUid"];
    $userEmail = $_POST["userEmail"];
    $userName = $_POST["userName"];
    $userLicenseNum = $_POST["userLicenseNum"];
    $userAddress = $_POST["userAddress"];
    $userPhone = $_POST["userPhone"];
    $userPrimProvince = $_POST["userPrimProvince"];
    $userFee = $_POST["userFee"];    
    
    $userPwd = $_POST["userPwd"];
    $userPwdRepeat = $_POST["userPwdRepeat"];

    

    
    
    include '../phpClass/dbconfig.php';
    include '../phpClass/dbh.class.php';
    include '../phpClass/consultantSignup.class.php';
    include '../phpClass/consultantSignupControler.class.php';
    
    
    
    $signup = new ConsultantSignupControler($userUid, $userEmail, $userName, $userLicenseNum, $userAddress, $userPhone, $userPrimProvince, $userFee, $userPwd, $userPwdRepeat);
    
    //
    $signup->signUpUser();
    
    //
    header("location: ../index.php?error=none");
    
    
}
