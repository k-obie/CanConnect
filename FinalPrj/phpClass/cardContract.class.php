<?php
class CardContract{
    
    private $contractID;
    private $clientID;
    private $clientUID;
    private $consultantID;
    private $consultantUID;
    private $fee;
    private $contractText;
    private $acceptStatus;
    private $payStatus;
    private $closedStatus;
    private $date;

    
    
    
    public function __construct($contractID, $clientID, $clientUID, $consultantID, $consultantUID, $fee, $contractText, $acceptStatus, $payStatus, $closedStatus, $date){
        
        $this->contractID = $contractID;
        $this->clientID = $clientID;
        $this->clientUID = $clientUID;        
        $this->consultantID = $consultantID;
        $this->consultantUID = $consultantUID;
        $this->fee = $fee;
        $this->contractText = $contractText;
        $this->acceptStatus = $acceptStatus;
        $this->payStatus = $payStatus;
        $this->closedStatus = $closedStatus;
        $this->date = $date;
    }
    
    
    
    
    public function createDivClientPending(){
        
        
        $div = '<div>';
        $div = $div . '<form action="phpAction/modifyContract.php" method="post">';
        $div = $div . '<input type="hidden" name="contractID" value="' . $this->contractID . '">';
        $div = $div . '<p>For: ' . $this->clientUID . '</p><br>';
        $div = $div . '<p>From: ' . $this->consultantUID . '</p><br>';
        $div = $div . '<p>Text:' . $this->contractText . '</p><br>';
        $div = $div . '<p>Status: ' . $this->acceptStatus . '</p><br>';
        $div = $div . '<p>Fee: ' . $this->fee . '$</p><br>';
        
        $div = $div . '<label>Select Status:</label><br>';
        $div = $div . '<input type="radio" name="statusClientResp" value="accept" name=status><br>';
        $div = $div . '<label for="accept" class="" >Accept and Pay</lable><br>';
        $div = $div . '<input type="radio" name="statusClientResp" value="reject" name="status"><br>';
        $div = $div . '<label for="reject" class="" >Reject</lable><br>';
        
        $div = $div . '<button type="Submit" name="submit">Select</button>';
        $div = $div . '</form>';
        $div = $div . '</div>';
                
        echo "$div";
        
        
    }
    
    
    public function createCompletContractCard(){
        
        
        $div = '<div>';
        $div = $div . '<p>Contract ID: ' . $this->contractID . '</p><br>';
        $div = $div . '<p>Text:' . $this->contractText . '</p><br>';
        $div = $div . '<p>Status: ' . $this->acceptStatus . '</p><br>';
        $div = $div . '<p>Fee: ' . $this->fee . '$</p><br>';
        $div = $div . '<p>Pay Status: ' . $this->payStatus . '</p><br>';
        $div = $div . '<p>Fee: ' . $this->fee . '$</p><br>';
        $div = $div . '<p>Closed Status: ' . $this->closedStatus . '</p><br>';
        
        $div = $div . '</div>';
        
        echo "$div";
        
        
    }
    
    
}