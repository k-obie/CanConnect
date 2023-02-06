<?php

if(isset($_POST["submit"]) && isset($_POST["status"]) )
{

   
    
    $consultantID = $_POST["consultantID"];
    $clientID = $_POST["clientID"];
    $clientUID = $_POST["clientUID"];
    $requestID = $_POST["requestID"];
    $status = $_POST["status"];
    
    $clientNAME = $_POST["clientNAME"];



    
    if($status == "reject"){

        
        include '../phpClass/dbconfig.php';
        include '../phpClass/dbh.class.php';
        include '../phpClass/request.class.php';
        include '../phpClass/requestControler.class.php';
        
        
        $request = new RequestControler();
        $request->setRequestID($requestID);
        $request->setConsultantID($consultantID);
        $request->setClientID($clientID);
        $request->setStatus($status);
        
        $request->moddifyRequest();
        
        session_start();
        $_SESSION["resultsRequestConCheck"] = FALSE;
        //
        header("location: ../profileConsultant.php?error=none");
        
    }
    else if ($status == "accept"){

        
        session_start();
        $_SESSION["contractClientID"] = $clientID;
        $_SESSION["contractClientUID"] = $clientUID;
        $_SESSION["contractClientNAME"] = $clientNAME;
        $_SESSION["requestID"] = $requestID;
        $_SESSION["status"] = $status;
        
        header("location: ../contractPage.php");
        
    }
    
    
}