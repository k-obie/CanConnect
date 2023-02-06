<?php

if(isset($_POST["submit"]))
{
    
    
    $consultantID = $_POST["consultantID"];
    $clientID = $_POST["clientID"];
    $fee = $_POST["fee"];
    $contractText = $_POST["contractText"];
    
    
    include '../phpClass/dbconfig.php';
    include '../phpClass/dbh.class.php';
    include '../phpClass/contract.class.php';
    include '../phpClass/contractControler.class.php';
    
    $contract = new contractControler();
    $contract->setClientID($clientID);
    $contract->setConsultantID($consultantID);
    $contract->setFee($fee);
    $contract->setContractText($contractText);
    
    $contract->makeContract();
    
    


    //Chaing the status of the request
    

    include '../phpClass/request.class.php';
    include '../phpClass/requestControler.class.php';
    
    session_start();
    $requestID = $_SESSION["requestID"];
    
    $status = "accept";
    
    $request = new RequestControler();
    $request->setRequestID($requestID);
    $request->setConsultantID($consultantID);
    $request->setClientID($clientID);
    $request->setStatus($status);
    
    $request->moddifyRequest();
    //
    
    session_start();
    $_SESSION["resultsRequestConCheck"] = FALSE;
    //
    header("location: ../profileConsultant.php?error=none");
   

    
    
    
}