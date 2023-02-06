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
		<title>Edit Client Page</title>
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
                	<H3>Edit your user information</H3>
    
    
                		
                	<form action="phpAction/edit.php" method="post">         
                		<?php 
                    		echo '<p>Username:</p><br>';
                    		echo '<input type="text" name="userUid" value="'.$_SESSION["userUid"].'">';
                    		echo '<p>Name:</p><br>';
                    		echo '<input type="text" name="userName" value="'.$_SESSION["userName"].'">';
                    		echo '<p>Address:</p><br>';
                    		echo '<input type="text" name="userAddr" value="'.$_SESSION["userAddr"].'">';
                    		echo '<p>Email:</p><br>';
                    		echo '<input type="text" name="userEmail" value="'.$_SESSION["userEmail"].'">';
                    		echo '<p>Current password:</p><br>';
                    		echo '<input type="text" name="currentPwd" placeholder="Current Passowrd">';
                    		echo '<p>New password:</p><br>';
                    		echo '<input type="text" name="newPwd" placeholder="New Passowrd">';
                		
                		?>
    
                		<br>
                		<button type="Submit" name="submit">Save Edits</button>
                		
                	</form>
                </div>
                
    
                
            </section>
    	</div>	
        
	
	</body>
</html>
