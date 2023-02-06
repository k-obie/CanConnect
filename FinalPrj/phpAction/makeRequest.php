<?php
echo "in make reques phpActiont";

if(isset($_POST["submit"]))
{
    $consultantID = $_POST["consultantID"];
    $clientID = $_POST["clientid"];    
    
    $consultantUID = $_POST["consultantUID"];
    $clientUID = $_POST["clientuid"];
    $requestText = $_POST["requestText"];
    

    
    include '../phpClass/dbconfig.php';
    include '../phpClass/dbh.class.php';
    include '../phpClass/request.class.php';
    include '../phpClass/requestControler.class.php';
    
    
    $request = new RequestControler();    
    $request->setClientID($clientID);
    $request->setConsultantID($consultantID);
    $request->setRequestText($requestText);
    
    $request->request();
        

    
    header("location: ../index.php?error=none");
    
    
    
}