<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Edit Consultant Page</title>
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
    				    echo '<li><a href="profileConsultant.php">Profile '.$_SESSION["userUid"].'</a></li>';
    				    echo '<li><a href="editConsultant.php" class="header-login" >Edit</a></li>';
    				    echo '<li><a href="phpAction/logout.php" class="header-login" >Logout</a></li>';
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
                    		echo '<input type="text" name="uid" value="'.$_SESSION["userUid"].'">';
                    		echo '<p>Email:</p><br>';
                    		echo '<input type="text" name="email" value="'.$_SESSION["userEmail"].'">';
                    		echo '<p>Name:</p><br>';
                    		echo '<input type="text" name="name" value="'.$_SESSION["userName"].'">';
                    		echo '<p>User License Number:</p><br>';
                    		echo '<input type="text" name="userLicenseNum" value="'.$_SESSION["userLicenseNum"].'">';
                    		echo '<p>Address:</p><br>';
                    		echo '<input type="text" name="address" value="'.$_SESSION["userAddress"].'">';
                    		echo '<p>Primary Province:</p><br>';
                    		echo '<input type="text" name="primProvince" value="'.$_SESSION["userPrimProvince"].'">';
                    		echo '<p>Phone:</p><br>';
                    		echo '<input type="text" name="phone" value="'.$_SESSION["userPhone"].'">';
                    		echo '<p>Fee:</p><br>';
                    		echo '<input type="text" name="fee" value="'.$_SESSION["userFee"].'">';
                    		
                    		
                    		echo '<p>Current password:</p><br>';
                    		echo '<input type="text" name="currentPwd" placeholder="Current Passowrd">';
                    		echo '<p>New password:</p><br>';
                    		echo '<input type="text" name="newPwd" placeholder="New Passowrd">';
                		
                		?>
    
                		<br>
                		<button type="Submit" name="submitCon">Save Edits</button>
                		
                	</form>
                </div>
                
    
                
            </section>
    
    		
    	</div>  
	
	</body>
</html>
