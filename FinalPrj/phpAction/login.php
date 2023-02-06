<?php

if(isset($_POST["submit"]))
{
    $userUid = $_POST["userUid"];
    $userPwd = $_POST["userPwd"]; 
    


    
    include '../phpClass/dbconfig.php';
    include '../phpClass/dbh.class.php';
    include '../phpClass/clientLogin.class.php';
    include '../phpClass/clientLoginControler.class.php';

    
    $login = new ClientLoginControler($userUid, $userPwd);
    
    //
    $login->loginUser();
    
    //
    header("location: ../index.php?error=none");
    
    
}

if(isset($_POST["submitCon"]))
{
    
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    

    
    include '../phpClass/dbconfig.php';
    include '../phpClass/dbh.class.php';
    include '../phpClass/consultantLogin.class.php';
    include '../phpClass/consultantLoginControler.class.php';
    
    
    $login = new ConsultantLoginControler($uid, $pwd);
    
    //
    $login->loginUser();
    
    //
    header("location: ../index.php?error=none");
    
    
    
}

