<?php
class Contract extends Dbh{
    

    //forConsultant
    public function doMakeContract($clientID, $consultantID, $fee, $contractText){
        $clientResponse = "pending";
        $isContractClosed = "no";
        $isContractPayed = "no";
        
        $stmt = $this->connect()->prepare("INSERT INTO `contract_tb` (`contract_id`, `contract_date`, `client_id`, `consultant_id`, `fee`, `client_resp`, `is_contract_closed`, `is_contract_payed`, `contract_text`) VALUES (NULL, current_timestamp(), ?, ?, ?, ?, ?, ?, ?);");
        

        if(!$stmt->execute(array($clientID, $consultantID, $fee, $clientResponse, $isContractClosed, $isContractPayed, $contractText) ) ){
            $stmt = null;
            header("location: ../consultantPage.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        
    }
    
    //forClient
    public function doFindContract($clientID){
        
        include 'cardContract.class.php';
        
        
        $stmt = $this->connect()->prepare("select contra.*, c.user_uid as 'consultant_uid', c.user_name as 'consultant_name' ,cl.user_uid as 'client_uid' from contract_tb as contra join consultant_users as c on contra.consultant_id=c.user_id join client_users as cl on cl.user_id=contra.client_id where contra.client_id = ? and contra.client_resp = 'pending';" );
        
        
        $stmt->execute(array($clientID));
        

        if($stmt->rowCount() != 0 ){
            $_SESSION["resultsContractClientCheckProfile"] = TRUE;
        }
        else{
            //This is exit if nothing is found
            $_SESSION["resultsContractClientCheckProfile"] = FALSE;
            return 0;
        }
        
        $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
        

        $listOfResults;
        $count = 0;
        foreach ($searchResults  as $oneRow){
            
            $cardContract = new CardContract($oneRow["contract_id"], $oneRow["client_id"], $oneRow["client_uid"], $oneRow["consultant_id"], $oneRow["consultant_uid"], $oneRow["fee"], $oneRow["contract_text"], $oneRow["client_resp"], $oneRow["is_contract_payed"], $oneRow["is_contract_closed"], $oneRow["contract_date"]);
            $listOfResults[$count] = $cardContract;
            
            $count = $count + 1;
        }

        $stmt = null;
        
        $listOfResults = serialize($listOfResults);
        return $listOfResults;
        
    }
    
    
    public function doRejectContract($contractID){
        
        
        $stmt = $this->connect()->prepare("UPDATE `contract_tb` SET `client_resp` = 'reject', `is_contract_closed` = 'yes' WHERE `contract_tb`.`contract_id` = ?;" );
        
        if(!$stmt->execute(array($contractID) ) ){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;

    }
    
    public function doAcceptPayContract($contractID){
        
        
        $stmt = $this->connect()->prepare("UPDATE `contract_tb` SET `client_resp` = 'accept', `is_contract_closed` = 'yes', `is_contract_payed` = 'yes' WHERE `contract_tb`.`contract_id` = ?;" );
        
        if(!$stmt->execute(array($contractID) ) ){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
        
    }
    
    
    public function dofindCompletContractClient($clientID){
        
        include 'cardContract.class.php';
        
        $stmt = $this->connect()->prepare("SELECT * FROM `contract_tb` WHERE `client_id` = ? AND `is_contract_closed` = 'yes' AND `is_contract_payed` = 'yes'");
        
        
        $stmt->execute(array($clientID));
        
        
        if($stmt->rowCount() != 0 ){
            $_SESSION["resultsContractClientCheck"] = TRUE;
        }
        else{
            //This is exit if nothing is found
            $_SESSION["resultsContractClientCheck"] = FALSE;
            return 0;
        }
        
        $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        $listOfResults;
        $count = 0;
        foreach ($searchResults  as $oneRow){
            
            $cardContract = new CardContract($oneRow["contract_id"], $oneRow["client_id"], "NA", $oneRow["consultant_id"], "NA", $oneRow["fee"], $oneRow["contract_text"], $oneRow["client_resp"], $oneRow["is_contract_payed"], $oneRow["is_contract_closed"], $oneRow["contract_date"]);
            $listOfResults[$count] = $cardContract;
            
            $count = $count + 1;
        }
        
        $stmt = null;
        
        $listOfResults = serialize($listOfResults);
        return $listOfResults;
        
    }
    
    
    public function dofindCompletContractConsltant($consultantID){
        
        include 'cardContract.class.php';
        
        $stmt = $this->connect()->prepare("SELECT * FROM `contract_tb` WHERE `consultant_id` = ? AND `is_contract_closed` = 'yes' AND `is_contract_payed` = 'yes'");
        
        
        $stmt->execute(array($consultantID));
        
        
        if($stmt->rowCount() != 0 ){
            $_SESSION["resultsContractConsultantCheck"] = TRUE;
        }
        else{
            //This is exit if nothing is found
            return 0;
        }
        
        $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        $listOfResults;
        $count = 0;
        foreach ($searchResults  as $oneRow){
            
            $cardContract = new CardContract($oneRow["contract_id"], $oneRow["client_id"], "NA", $oneRow["consultant_id"], "NA", $oneRow["fee"], $oneRow["contract_text"], $oneRow["client_resp"], $oneRow["is_contract_payed"], $oneRow["is_contract_closed"], $oneRow["contract_date"]);
            $listOfResults[$count] = $cardContract;
            
            $count = $count + 1;
        }
        
        $stmt = null;
        
        $listOfResults = serialize($listOfResults);
        return $listOfResults;
        
    }
        
        
    
}