<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Profile Consultant</title>
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
				        if(isset($_SESSION["userId"]) && isset($_SESSION["userLicenseNum"]) ){
        				    echo '<li><a href="profileConsultant.php">Profile '.$_SESSION["userUid"].'</a></li>';
        				    echo '<li><a href="editConsultantPage.php" class="header-login" >Edit</a></li>';
        				    echo '<li><a href="phpAction/logout.php" class="header-login" >Logout</a></li>';
        				    echo '<li><a href="completContractPage.php" class="header-login" >Complete Contract</a></li>';
    				    }

				?>	
    				
    			</ul>			
			</div>
			
	
		
		</nav>
	
    	<div id="wrapper">
            <section>
                <div class="">
                	<H3>Your profile Page</H3>
          
                		<?php 
                		echo '<p class="profile">Username: </p><br><p>'.$_SESSION["userUid"].'</p><br>';
    
                		echo '<p class="profile">Email:</p><br><p>'.$_SESSION["userEmail"].'</p><br>';
                		
                		echo '<p class="profile">Name:</p><br><p>'.$_SESSION["userName"].'</p><br>';
                		
                		echo '<p class="profile">Lincence Number :</p><br><p>'.$_SESSION["userLicenseNum"].'</p><br>';
                		
                		echo '<p class="profile">Address:</p><br><p>'.$_SESSION["userAddress"].'</p><br>';
                		
                		echo '<p class="profile">Primary Province:</p><br><p>'.$_SESSION["userPrimProvince"].'</p><br>';
                		
                		echo '<p class="profile">Phone:</p><br><p>'.$_SESSION["userPhone"].'</p><br>';
                		
                		echo '<p class="profile">Fee:</p><br><p>'.$_SESSION["userFee"].'$</p><br>';
                		
    
                		?>
    
                </div>            
            </section>
    		
    		<section>
    			<h3>Request Pending</h3>
    						
        		<div>
        			<?php 
        			//REQUEST Section
        			include 'phpClass/dbconfig.php';
        			include 'phpClass/dbh.class.php';
        			include 'phpClass/request.class.php';
        			include 'phpClass/requestControler.class.php';
        			
        			$consultantID = $_SESSION["userId"];
        			
        			$request = new RequestControler();
        			$request->setConsultantID($consultantID);
        			
        			$result = $request->findRequest();
        			
        			if(isset($_SESSION["resultsRequestConCheck"]) && $_SESSION["resultsRequestConCheck"] == TRUE ){
        			    
        			    include 'phpClass/cardConsultantSearch.class.php';
        			    
    ;
        			    
        			    try{
        			        $result = unserialize($result);
        			        
        			        foreach ($result as $oneRequestCard) {
        			            $oneRequestCard->createDiv();
        			        }
    
        			    }catch (PDOException $exception){
        			        echo "<p>No results Found</p>";
        			    }
    
        			    
        			}
        			
        			?>
        			
        		</div>
    		</section>
    		
    	</div>
	
	</body>
</html>
