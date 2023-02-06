<?php


if(isset($_POST["submit"]))
{

    
    
    $searchLicenseNum =  $_POST["searchLicenseNum"];
    $searchProvince =  $_POST["searchProvince"];
    $searchMinFee = $_POST["searchMinFee"];
    $searchMaxFee = $_POST["searchMaxFee"];
    
    if(empty($_POST["searchLicenseNum"])){
        $searchLicenseNum = "%%";
    }
    else{
        $searchLicenseNum = $_POST["searchLicenseNum"];
    }
    
    //NO LONGER NEEDED SINCE VERIVICATION IS DONE IN FUNCTION SEARCH()
    if(empty($_POST["searchProvince"])){
        $searchProvince = "%%";
    }
    else{
        $searchProvince = $_POST["searchProvince"];
    }
    
    if(empty($_POST["searchMinFee"])){
        $searchMinFee = "0";
    }
    else{
        $searchMinFee = $_POST["searchMinFee"];
    }
    
    if(empty($_POST["searchMaxFee"])){
        $searchMaxFee = "1000000000";
    }
    else{
        $searchMaxFee = $_POST["searchMaxFee"];
    }
    
       
    
    include '../phpClass/dbconfig.php';
    include '../phpClass/dbh.class.php';
    include '../phpClass/searchConsultant.class.php';
    include '../phpClass/searchConsultantControler.class.php';
    
    

    $search = new SearchConsultantControler($searchLicenseNum, $searchProvince, $searchMinFee, $searchMaxFee);
    
    $search->search();
    //
    header("location: ../searchConsultantPage.php?error=none");
}