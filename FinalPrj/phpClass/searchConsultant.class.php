<?php
class SearchConsultant extends Dbh{
   
    
    
    function doSearch($searchLicenseNum, $searchProvince, $searchMaxFee, $searchMinFee){
        include 'cardConsultantSearch.class.php';
       
        $stmt = $this->connect()->prepare('SELECT * FROM `consultant_users` WHERE `user_licenseNum` LIKE ? AND `user_primProvince` LIKE ? AND `user_fee` BETWEEN ? AND ?;');
        
        $stmt->execute(array($searchLicenseNum, $searchProvince, $searchMaxFee, $searchMinFee));
        
        $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
        
        $listOfResults;
        $count = 0;
        foreach ($searchResults  as $oneRow){
            
            $cardConsultantSearch = new CardConsultantSearch($oneRow["user_id"], $oneRow["user_uid"], $oneRow["user_email"], $oneRow["user_name"], $oneRow["user_licenseNum"], $oneRow["user_phone"], $oneRow["user_primProvince"], $oneRow["user_fee"]);
            $listOfResults[$count] = $cardConsultantSearch;

            $count = $count + 1;
        }
        
        session_start();
        $_SESSION["searchResults"] = serialize($listOfResults);

        
        $stmt = null;
   
            
    }
    
}