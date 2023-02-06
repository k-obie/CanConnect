<?php 

if(isset($_POST["submit"]))
{
    

    //
    $userUid = $_POST["userUid"];
    $userName = $_POST["userName"];
    $userAddr = $_POST["userAddr"];
    $userEmail = $_POST["userEmail"];
    
    $currentPwd = $_POST["currentPwd"];
    $newPwd = $_POST["newPwd"];

    
    include '../phpClass/dbconfig.php';
    include '../phpClass/dbh.class.php';
    include '../phpClass/clientEdit.class.php';
    include '../phpClass/clientEditControler.class.php';
    

    $edit  = new ClientEditControler($userUid, $userName, $userAddr, $userEmail, $currentPwd, $newPwd);
    
 
    $edit->doEditUser();


    header("location: ../index.php?error=none");
    
    
}

if(isset($_POST["submitCon"]))
{

    
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $userLicenseNum = $_POST["userLicenseNum"];
    $address = $_POST["address"];
    $primProvince = $_POST["primProvince"];
    $phone = $_POST["phone"];
    $fee = $_POST["fee"];
    
    
    $currentPwd = $_POST["currentPwd"];
    $newPwd = $_POST["newPwd"];
    
    
    include '../phpClass/dbconfig.php';
    include '../phpClass/dbh.class.php';
    include '../phpClass/consultantEdit.class.php';
    include '../phpClass/consultantEditControler.class.php';
    
   
    $edit  = new ConsultantEditControler($uid, $email, $name, $userLicenseNum, $address, $primProvince, $phone, $fee, $currentPwd, $newPwd);
    
    //
    $edit->doEditUser();
    
    //
    header("location: ../index.php?error=none");
    
    
}
