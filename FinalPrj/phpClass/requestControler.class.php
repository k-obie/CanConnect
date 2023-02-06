<?php
class RequestControler extends Request{

    private $clientID;
    private $consultantID;     
    
    
    private $requestText;
    private $requestID;
    private $status;




    public function __construct( ) {
        
    }
   


        
//     }
    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
    
    /**
     * @return mixed
     */
    public function getRequestID()
    {
        return $this->requestID;
    }
    
    /**
     * @param mixed $requestID
     */
    public function setRequestID($requestID)
    {
        $this->requestID = $requestID;
    }

    /**
     * @return mixed
     */
    public function getClientID()
    {
        return $this->clientID;
    }

    /**
     * @return mixed
     */
    public function getConsultantID()
    {
        return $this->consultantID;
    }

    /**
     * @return mixed
     */
    public function getRequestText()
    {
        return $this->requestText;
    }

    /**
     * @param mixed $clientID
     */
    public function setClientID($clientID)
    {
        $this->clientID = $clientID;
    }

    /**
     * @param mixed $consultantID
     */
    public function setConsultantID($consultantID)
    {
        $this->consultantID = $consultantID;
    }

    /**
     * @param mixed $requestText
     */
    public function setRequestText($requestText)
    {
        $this->requestText = $requestText;
    }


    
    public function request(){
                
        $this->doRequest($this->clientID, $this->consultantID, $this->requestText);
        
        
    }
    
    public function findRequest(){
        
        $results = $this->searchRequest($this->consultantID);
        return $results;
    }
    
    public function moddifyRequest() {
        $this->doModdifyRequest($this->clientID, $this->consultantID, $this->requestID, $this->status);
    }

    
    
    
    
    
}
    
