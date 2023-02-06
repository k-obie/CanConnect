<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Search Consultant Page</title>
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
        	<div>
        		<form action="phpAction/search.php" method="post">
        		<p>Enter Lisense Number:</p><br>
                <input type="text" name="searchLicenseNum" placeholder="ex:A123123">
                <p>Province:</p><br>
                <input type="text" name="searchProvince" placeholder="QC">
                <p>Min fee:</p><br>
         		<input type="text" name="searchMinFee" placeholder="0">
                <p>Max fee:</p><br>
                <input type="text" name="searchMaxFee" placeholder="100000">
                <br>
                <button type="Submit" name="submit">Search</button>
        		</form>
        	</div>
        	
        	
        	
        	
        	<?php 
        
        	   
        	   echo "<h3>Here are the results of your filters.</h3>";
        	
        		if(isset($_SESSION["searchResults"])){
                    include 'phpClass/cardConsultantSearch.class.php';                    
                    
        		    
                    try{
                        $result = unserialize($_SESSION["searchResults"]);
                        if($result != NULL){
                            foreach ($result as $oneConsultantCard) {
                                $str = $oneConsultantCard->createDiv();
                                
                            }
                        }
        
                    }catch (PDOException $exception){
                        echo "<p>No results Found</p>";
                    }
                    
        
        		}
        
        
        	?>	
    	</div>
	</body>
</html>
