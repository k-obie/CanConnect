<?php

class CardConsultantSearch{
    
    private $id;
    private $uId;
    private $email;
    private $name;
    private $licenseNum;
    private $phone;
    private $primProvince;
    private $fee;
    
    
    public function __construct($id, $uId, $email, $name, $licenseNum, $phone, $primProvince, $fee){
        
        $this->id = $id;
        $this->uId = $uId;
        $this->email = $email;
        $this->name = $name;
        $this->licenseNum = $licenseNum;
        $this->phone = $phone;
        $this->primProvince = $primProvince;
        $this->fee = $fee;
        
    }
    


    
    public function createDiv(){
        
        $div = '<div>';
        $div = $div . '<form action="requestPage.php" method="post">';
        $div = $div . '<input type="hidden" name="consultantID" value="' . $this->id . '">';
        $div = $div . '<input type="hidden" name="consultantUID" value="' . $this->uId . '">';
        $div = $div . '<input type="hidden" name="consultantNAME" value="' . $this->name . '">';
        $div = $div . '<p>Name: ' . $this->name . '</p><br>';
        $div = $div . '<p>License Number:' . $this->licenseNum . '</p><br>';
        $div = $div . '<p>Province: ' . $this->primProvince . '</p><br>';
        $div = $div . '<p>Email: ' . $this->email . '</p><br>';
        $div = $div . '<p>Phone: ' . $this->phone . '</p><br>';
        $div = $div . '<p>Fee: ' . $this->fee . '$</p><br>';
        $div = $div . '<button type="Submit" name="submit">Select</button>';
        $div = $div . '</form>';
        $div = $div . '</div>';
       
        
        echo "$div";
        
        
    }

    
}
