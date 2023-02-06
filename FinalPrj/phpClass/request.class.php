<?php
class Request extends Dbh{
    
    //forClient
    public function doRequest($clientID, $consultantID, $requestText){
        $stmt = $this->connect()->prepare('INSERT INTO `request_tb` (`request_id`, `request_date`, `client_id`, `consultant_id`, `request_text`, `consultant_resp`) VALUES (NULL, current_timestamp(), ?, ?, ?, ?)');
   
        $pending = "pending";
        
        echo "I am in do request <br>$requestText";
        
        if(!$stmt->execute(array($clientID, $consultantID, $requestText, $pending)) ){
            $stmt = null;
            header("location: ../consultantPage.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
        
    }
    //ForConsultant
    public function searchRequest($consultantID){
        include 'cardRequest.class.php';
        
        $stmt = $this->connect()->prepare("select * from request_tb as r join client_users as c on r.client_id=c.user_id where r.consultant_id = ? and r.consultant_resp = 'pending'" );
        
        
        $stmt->execute(array($consultantID));


        if($stmt->rowCount() != 0 ){
            $_SESSION["resultsRequestConCheck"] = TRUE;
        }
        else{
            //This is exit if nothing is found
            return 0;
        }
        
        $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        $listOfResults;
        $count = 0;
        foreach ($searchResults  as $oneRow){
 
            $cardRequest = new CardRequest($oneRow["request_id"], $oneRow["client_id"], $oneRow["user_uid"], $oneRow["request_text"], $oneRow["consultant_resp"], $oneRow["consultant_id"], $oneRow["user_name"]);
            $listOfResults[$count] = $cardRequest;
            
            $count = $count + 1;
        }
        
        
        
        $stmt = null;
        
        $listOfResults = serialize($listOfResults);
        return $listOfResults;
                
    }
    
   
    public function doModdifyRequest($clientID, $consultantID, $requestID, $status){
        $stmt = $this->connect()->prepare('UPDATE `request_tb` SET  `consultant_resp` = ? WHERE `request_tb`.`request_id` = ? AND `request_tb`.`client_id` = ? AND `request_tb`.`consultant_id` = ?' );

                
        if(!$stmt->execute(array($status, $requestID, $clientID, $consultantID)) ){
            $stmt = null;
            header("location: ../consultantPage.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
        
    }
        
}