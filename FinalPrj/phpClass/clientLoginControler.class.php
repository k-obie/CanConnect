<?php



class ClientLoginControler extends ClientLogin{
    

    
    private $userUid;
    private $userPwd; 

    
    public function __construct($userUid=null, $userPwd=null) {
        
        $this->userUid = $userUid;
        $this->userPwd = $userPwd;

    }
    
    public function loginUser(){
        
        if($this-> emptyInput() == false ){
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        
        $this->getUser($this->userUid, $this->userPwd);
       
    }
    
    
    public function emptyInput(){
        $result;
        
        if(empty($this->userUid) || empty($this->userPwd)  ){
            
            $result = FALSE;
        }
        else {
            $result = TRUE;
        }
        
        return $result;
    }
  
    
}