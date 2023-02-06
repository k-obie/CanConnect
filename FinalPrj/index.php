<?php

session_start();

//die(print_r($stuff, true ));
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link rel=" stylesheet" href="./css/style.css">
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
    				    echo '<li><a href="completContractPage.php" class="header-login" >Complete Contract</a></li>';
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
    			<h3>Lets get started</h3>
    			<p> We help people to connecte to make a personal experiense in the start-up visa program.</p>
    		</div>
		
		
		
    		<div>
    			<?php 
    			if(isset($_GET["error"])){
    			    $error = $_GET["error"];
    			    if($error != "none"){
    			        echo '<h3 style="background-color:orangeRed"> Error:'.$error.'</h3>';
    			        
    			    }
    			}
    			
    			?>
    		</div>
    		
    	
    	
    	
    		<?php 
    		  if(isset($_SESSION["userId"])){
    
    		      echo "<section hidden>";
    		  }
    		  else{
    		      echo "<section>";
    		  }
    		?>
                <div>
                	<h3>SIGN UP</h3>
                	
                	<p>Don't have a acount? Sign up here:</p>
                	
                	<form action="phpAction/signup.php" method="post">
                		<input type="text" name="userUid" placeholder="Username">
                		<input type="text" name="userName" placeholder="Full Name">
                		<input type="text" name="userAddr" placeholder="Address">
                		<input type="text" name="userEmail" placeholder="E-mail">                		
                		<input type="text" name="userPwd" placeholder="Passowrd">
                		<input type="text" name="userPwdRepeat" placeholder="Passowrd Repeat">
                		<br>
                		<button type="Submit" name="submit">Sign up</button>
                		
                	</form>
                </div>
                
                
                
                
                <div>
                	<h3>Login</h3>
                	
                	<p>Are you a member? Login up here:</p>
                	
                	<form action="phpAction/login.php" method="post">
                		<input type="text" name="userUid" placeholder="Username">
                		<input type="text" name="userPwd" placeholder="Passowrd">
                		<br>
                		<button type="Submit" name="submit">Login</button>        		
                	</form>
                </div>
                
                <div>
    
                		<p>Are you a Consultant? Click here:</p>
                		
                		<input type="button" onclick="location.href='consultantPage.php'" Value="Consultant Login" >
                </div>
                
            </section>
            
		</div>

		
        
	
	</body>
</html>
