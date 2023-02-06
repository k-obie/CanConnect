<?php

if(isset($_POST["submit"]) && isset($_POST["statusClientResp"]) )
{
    
    
    
    $contractID = $_POST["contractID"];
    $status = $_POST["statusClientResp"];
    

    
    if($status == "reject"){
        
        
        include '../phpClass/dbconfig.php';
        include '../phpClass/dbh.class.php';
        include '../phpClass/contract.class.php';
        include '../phpClass/contractControler.class.php';
        
        
        $contract = new ContractControler();
        $contract->setContractID($contractID);
        
        $contract->rejectContract();
        
        session_start();
        $_SESSION["resultsContractClientCheck"] = FALSE;
        //
        header("location: ../profileClient.php?error=none");
        
    }
    else if ($status == "accept"){
        
        include '../phpClass/dbconfig.php';
        include '../phpClass/dbh.class.php';
        include '../phpClass/contract.class.php';
        include '../phpClass/contractControler.class.php';
        
        
        $contract = new ContractControler();
        $contract->setContractID($contractID);
        
        $contract->acceptPayContract();
        
        session_start();
        $_SESSION["resultsContractClientCheck"] = FALSE;
        //
        header("location: ../profileClient.php?error=none");
        
       
        
    }
    
    
}