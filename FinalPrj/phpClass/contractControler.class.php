<?php
class ContractControler extends Contract{
    
    private $clientID;
    private $consultantID;
    private $fee;   
    private $contractText;
    
    private $contractID;
    
    /**
     * @return mixed
     */
    public function getContractID()
    {
        return $this->contractID;
    }

    /**
     * @param mixed $contractID
     */
    public function setContractID($contractID)
    {
        $this->contractID = $contractID;
    }

    public function __construct(){
        
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
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @return mixed
     */
    public function getContractText()
    {
        return $this->contractText;
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
     * @param mixed $fee
     */
    public function setFee($fee)
    {
        $this->fee = $fee;
    }

    /**
     * @param mixed $contractText
     */
    public function setContractText($contractText)
    {
        $this->contractText = $contractText;
    }


    
    public function makeContract() {
        $this->doMakeContract($this->clientID, $this->consultantID, $this->fee, $this->contractText);        ;
    }
    
    public function findContract(){
        $results = $this->doFindContract($this->clientID);
        return $results;
    }
    
    
    public function rejectContract(){
        $results = $this->doRejectContract($this->contractID);
        return $results;
    }
    
    public function acceptPayContract(){
        $results = $this->doAcceptPayContract($this->contractID);
        return $results;
    }
    
    
    public function findCompletContractClient($clientID){
        $results = $this->dofindCompletContractClient($clientID);
        return $results;
    }
    
    public function findCompletContractConsltant($consultantID){
        $results = $this->dofindCompletContractConsltant($consultantID);
        return $results;
    }
    
    
}