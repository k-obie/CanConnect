<?php
session_start();
if(isset($_SESSION["userId"]) == FALSE){
    header("location: ../index.php?error=userIdNotSet");
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Profile Client</title>
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
        				if(isset($_SESSION["userId"])){
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
            <section>
                <div class="index-login-signup">
                	<H3>Your profile Page</H3>
          
                		<?php 
                    		echo '<p class="profile">Username: </p><br><p>'.$_SESSION["userUid"].'</p><br>';
                    		echo '<p class="profile">Name:</p><br><p>'.$_SESSION["userName"].'</p><br>';
                    		echo '<p class="profile">Email:</p><br><p>'.$_SESSION["userEmail"].'</p><br>'; 
                    		echo '<p class="profile">Address:</p><br><p>'.$_SESSION["userAddr"].'</p><br>';
    
                		?>
    
                </div>            
            </section>
            
            
            	<section>
    			<h3>Contract Pending</h3>
    						
        		<div>
        			<?php 
            			//REQUEST Section
            			include 'phpClass/dbconfig.php';
            			include 'phpClass/dbh.class.php';
            			include 'phpClass/contract.class.php';
            			include 'phpClass/contractControler.class.php';
            			
            			try{
            			    $clientID = $_SESSION["userId"];
            			    
            			    $contract = new ContractControler();
            			    $contract->setClientID($clientID);
            			    
            			    $result = $contract->findContract();
            			    
            			    if(isset($_SESSION["resultsContractClientCheckProfile"]) && $_SESSION["resultsContractClientCheckProfile"] == TRUE){
            			        

            			        $result = unserialize($result);
            			        
            			        foreach ($result as $oneRequestCard) {
            			            $oneRequestCard->createDivClientPending();
            			            
            			        }
            			    }
            			}catch (PDOException $exception) {
            			    
            			}
        			
        			?>
        			
        		</div>
    		</section>
    
    	</div>
        
	
	</body>
</html>
