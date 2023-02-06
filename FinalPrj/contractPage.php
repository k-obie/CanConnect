<?php

session_start();

$consultantID = $_SESSION["userId"];
$licenseNum = $_SESSION["userLicenseNum"];
$name = $_SESSION["userName"];
$fee = $_SESSION["userFee"];
$clientUID = $_SESSION["contractClientUID"];
$clientID = $_SESSION["contractClientID"];
$clientNAME = $_SESSION["contractClientNAME"];

$phone = $_SESSION["userPhone"];

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Contract Page</title>
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
    				
    				echo '<li><a href="profileConsultant.php">Profile '.$_SESSION["userUid"].'</a></li>';
    				echo '<li><a href="editConsultantPage.php" class="header-login" >Edit</a></li>';
    				echo '<li><a href="phpAction/logout.php" class="header-login" >Logout</a></li>';
    	
    				?>
    				
    			</ul>			
			</div>
			
		</nav>
		
		<div id="wrapper">
		
    		<?php 
    		  
    		  echo "<br> <div>Hello, $name you are making a Contract for a client $clientNAME</div><br>";
    		?>
    		
    		<form action="phpAction/makeContract.php" method="post">
    		
    			<?php 
    			    echo '<input type="hidden" name="consultantID" value="' . $consultantID . '">';
    			    echo '<input type="hidden" name="clientID" value="' . $clientID . '">'; 
    			    echo '<input type="hidden" name="clientNAME" value="' . $clientNAME . '">';
    			    echo '<input type="hidden" name="fee" value="' . $fee . '">'; 
        			

    			?>
    			
    			<textarea name="contractText" rows="4" cols="50">
        			<?php
        			$date = date("Y/m/d");
        			     echo "This is a contract: I ($name)($licenseNum) will assist my client($clientNAME) to get a canadian visa. My fee is  $fee $. We will communicate by phone($phone). $date ";
        			     
        			?>
    			</textarea>
    					
      			<br>
      			<button type="Submit" name="submit">Send</button> 
    			
    		</form>
		
		</div>
	
	</body>
</html>