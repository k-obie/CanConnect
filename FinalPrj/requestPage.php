<?php
session_start();

if(isset($_POST["submit"]) && isset($_SESSION["userUid"]) && !isset($_SESSION["userLicenseNum"]))
{
    
    $consultantID = $_POST["consultantID"];    
    $consultantUID = $_POST["consultantUID"];
    $consultantNAME = $_POST["consultantNAME"];
    
    $userid = $_SESSION["userId"];
    $useruid = $_SESSION["userUid"];
    $username = $_SESSION["userName"];
    

    
}
else{
    header("location: index.php?error=useruidNotSetOrUserLicenseNumIsSet");
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Request Page</title>
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

    				    echo '<li><a href="profileClient.php">Profile '.$_SESSION["userUid"].'</a></li>';
    				    echo '<li><a href="editClientPage.php" class="header-login" >Edit</a></li>';
    				    echo '<li><a href="phpAction/logout.php" class="header-login" >Logout</a></li>';
    				    echo '<li><a href="searchConsultantPage.php" class="header-login" >Search for a Consultant</a></li>';
    				    echo '<li><a href="completContractPage.php" class="header-login" >Complete Contract</a></li>';
    				    
    				?>			
    				
    			</ul>			
			</div>
			
		</nav>
		
		<div id="wrapper">
		
    		<?php 
    		echo "<br> <div>Hello, $username you are making a request to $consultantNAME.</div><br>";
    		?>
    		
    		<form action="phpAction/makeRequest.php" method="post">
    		
    			<?php 
        			echo '<input type="hidden" name="consultantID" value="' . $consultantID . '">';
        			echo '<input type="hidden" name="clientid" value="' . $userid . '">';
        			
        			echo '<input type="hidden" name="consultantUID" value="' . $consultantUID . '">';
        			echo '<input type="hidden" name="clientuid" value="' . $useruid . '">';
    			?>
    			
    			<textarea name="requestText" rows="4" cols="50">
        			<?php
        			     echo "Hello, I ($username) am making a request to you($consultantNAME). Will you accept my request and make a contract to help me get a canadian work visa?  ";
        			     
        			?>
    			</textarea>
    					
      			<br>
      			<button type="Submit" name="submit">Send</button> 
    			
    		</form>
    		
    	</div>	
	
	</body>
</html>



