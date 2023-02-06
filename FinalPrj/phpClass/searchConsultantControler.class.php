<?php
class SearchConsultantControler extends SearchConsultant{
    


    private $searchLicenseNum;
    private $searchProvince;
    private $searchMinFee;
    private $searchMaxFee;
    
    
    
    public function __construct($searchLicenseNum, $searchProvince, $searchMinFee, $searchMaxFee) {
        $this->searchLicenseNum = $searchLicenseNum;
        $this->searchProvince = $searchProvince;
        $this->searchMinFee = $searchMinFee;
        $this->searchMaxFee = $searchMaxFee;
        

                
    }
    
    public function search(){
        
        $this->searchLicenseNum = $this->validLicenseNumber();
        $this->searchProvince = $this->validProvince();
        $this->searchMinFee = $this->validMinNum();
        $this->searchMaxFee = $this->validMaxNum();
        
        $this->doSearch($this->searchLicenseNum, $this->searchProvince, $this->searchMinFee, $this->searchMaxFee);
        
        
    }
    
    
    public function validLicenseNumber(){
        
        $result;
        
        if(!preg_match("/^[A-Z]\d{6}$/", $this->searchLicenseNum) ){
            
            $result = "%%";
        }
        else {
            $result = $this->searchLicenseNum;
        }
        

        return $result;
        
    }
    
    
    public function validProvince(){
        
        $result;
        
        $provinces = array("ON", "QC", "NS", "NB", "MB" ,"MB", "BC", "PE", "SK", "AB", "NL");
        
        $index = array_search($this->searchProvince, $provinces);
        
        if(!is_numeric($index) ){
            
            $result = "%%";
        }
        else {
            $result = $this->searchProvince;
        }
        
        return $result;
        
    }
    
    
    public function validMinNum(){
        
        $result;
        
        if(!preg_match("/^[0-9]*$/", $this->searchMinFee) ){
            
            $result = 0;
        }
        else {
            $result = $this->searchMinFee;
        }
        
        return $result;
        
    }
    
    public function validMaxNum(){
        
        $result;
        
        if(!preg_match("/^[0-9]*$/", $this->searchMaxFee) ){
            
            $result = 1000000000;
        }
        else {
            $result = $this->searchMaxFee;
        }
        
        return $result;
        
    }
    
}