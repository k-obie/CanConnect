<?php

session_start();

//die(print_r($stuff, true ));
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Complete Contract Page</title>
		<link rel=" stylesheet" type="text/css" href="./css/style.css">
	</head>
	<body>
	
		<h2>CANCONNECT</h2>
		<nav class="container">
			<div>
    			
				
    			<ul>
					<img src="./img/logo64x64.png" alt="notFoundImg">

    				<li><a href="index.php"> Home</a></li>
    				<li><a href="index.php"> About us</a></li>
    				
    				
    				<?php
    					if(isset($_SESSION["userLicenseNum"])){
    				    echo '<li><a href="profileConsultant.php">Profile '.$_SESSION["userUid"].'</a></li>';
    				    echo '<li><a href="editConsultantPage.php" class="header-login" >Edit</a></li>';
    				    echo '<li><a href="phpAction/logout.php" class="header-login" >Logout</a></li>';
    				    echo '<li><a href="completContractPage.php" class="header-login" >Complet Contract</a></li>';
    				}    				        
    				else if(isset($_SESSION["userId"])){
    				    echo '<li><a href="profileClient.php">Profile '.$_SESSION["userUid"].'</a></li>';
    				    echo '<li><a href="editClientPage.php" class="header-login" >Edit</a></li>';
    				    echo '<li><a href="phpAction/logout.php" class="header-login" >Logout</a></li>';
    				    echo '<li><a href="searchConsultantPage.php" class="header-login" >Search for a Consultant</a></li>';
    				    echo '<li><a href="completContractPage.php" class="header-login" >Complete Contract</a></li>';
    				}
			    			
    				?>	
    			</ul>			
			</div>
			
			
		</nav>
	
	
    	<div id="wrapper">
    	
    		<div>
    			<h2>Complet Contract</h2>
    			
    			<?php 
    			include 'phpClass/dbconfig.php';
    			include 'phpClass/dbh.class.php';
    			include 'phpClass/contract.class.php';
    			include 'phpClass/contractControler.class.php';
    			
    			try{
    			    $userID = $_SESSION["userId"];
    			    
    			    $contract = new ContractControler();
    			    
    			    
    			    if(isset($_SESSION["userLicenseNum"])){
    			        //Consultant
    			        
    			        $consultantID = $_SESSION["userId"];
    			        
    			        $result = $contract->findCompletContractConsltant($consultantID);
    			        
    			        if(isset($_SESSION["resultsContractConsultantCheck"]) && $_SESSION["resultsContractConsultantCheck"] == TRUE){
    			            
    			            $result = unserialize($result);
    			            
    			            foreach ($result as $oneRequestCard) {
    			                $oneRequestCard->createCompletContractCard();
    			                
    			            }
    			        }
    			        
    			        
    			    }
    			    else if(isset($_SESSION["userId"])){
    			        //Client
    			        
    			        $clientID = $_SESSION["userId"];
    			        $result = $contract->findCompletContractClient($clientID);
    			        
    			        if(isset($_SESSION["resultsContractClientCheck"]) && $_SESSION["resultsContractClientCheck"] == TRUE){
    
    			            $result = unserialize($result);
    			            
    			            foreach ($result as $oneRequestCard) {
    			                $oneRequestCard->createCompletContractCard();
    			                
    			            }
    			        }
    			        
    			    }
    
    			    
    			}catch (PDOException $exception) {
    			    
    			}
    			
    			?>
    			
    		
    		</div>
    	</div>		
	
	</body>
</html>
