<?php
//Request
class CardRequest{
    
    private $requestID;
    private $clientID;
    private $clientUID;
    private $requestText;
    private $requestStatus;
    private $consultantID;
    private $clientNAME;

    
    
    public function __construct( $requestID, $clientID, $clientUID, $requestText, $requestStatus, $consultantID, $clientNAME ){
        
        $this->requestID = $requestID;
        $this->clientID = $clientID;
        $this->clientUID = $clientUID;
        $this->requestText = $requestText;
        $this->requestStatus = $requestStatus;
        $this->consultantID = $consultantID;
        $this->clientNAME = $clientNAME;
    }
    

    
    
    public function createDiv(){
        
        $div = '<div>';
        $div = $div . '<form action="phpAction/modifyRequest.php" method="post">';
        $div = $div . '<input type="hidden" name="consultantID" value="' . $this->consultantID . '">';
        $div = $div . '<input type="hidden" name="clientID" value="' . $this->clientID . '">';
        $div = $div . '<input type="hidden" name="clientUID" value="' . $this->clientUID . '">';
        $div = $div . '<input type="hidden" name="requestID" value="' . $this->requestID . '">';
        $div = $div . '<input type="hidden" name="clientNAME" value="' . $this->clientNAME . '">';
        $div = $div . '<p>From: ' . $this->clientNAME . '</p><br>';
        $div = $div . '<p>Text:' . $this->requestText . '</p><br>';
        $div = $div . '<p>Status: ' . $this->requestStatus . '</p><br>';
        $div = $div . '<label>Select Status:</label><br>';
        $div = $div . '<input type="radio" name="status" value="accept" name=status><br>';
        $div = $div . '<label for="accept" class="" >Accept</lable><br>';
        $div = $div . '<input type="radio" name="status" value="reject" name="status"><br>';
        $div = $div . '<label for="reject" class="" >Reject</lable><br>';

        $div = $div . '<button type="Submit" name="submit">Select</button>';
        $div = $div . '</form>';
        $div = $div . '</div>';
       
        
        echo "$div";
        
        
    }

    
}
