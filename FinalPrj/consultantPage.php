
<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Consultant Page</title>
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
        				    echo '<li><a href="editConsultantPage.php" class="header-login" >Edit</a></li>';
        				    echo '<li><a href="phpAction/logout.php" class="header-login" >Logout</a></li>';
        				}
   			    			
    				?>	
    			</ul>			
			</div>
			
			
		</nav>
	
		<div id="wrapper">
		
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
                	<H3>SIGN UP</H3>
                	
                	<p>Don't have a Consultant acount? Sign up here:</p>
                	
                	<form action="phpAction/signup.php" method="post">
                		<input type="text" name="userUid" placeholder="Username">
                		<input type="text" name="userEmail" placeholder="E-mail">
                		<input type="text" name="userName" placeholder="Name">
                		<input type="text" name="userLicenseNum" placeholder="License Number">
                		<input type="text" name="userAddress" placeholder="Address">
                		<input type="text" name="userPhone" placeholder="Phone">
                		<input type="text" name="userPrimProvince" placeholder="Primary Province">
                		<input type="text" name="userFee" placeholder="Fee">
                		<input type="text" name="userPwd" placeholder="Passowrd">
                		<input type="text" name="userPwdRepeat" placeholder="Passowrd Repeat">
                		
                		<br>
                		<button type="Submit" name="submitCon">Sign up</button>
                		
                	</form>
                </div>
                            
                
                
                <div>
                	<H3>Login</H3>
                	
                	<p>Are you a Consultant member? Login up here:</p>
                	
                	<form action="phpAction/login.php" method="post">
                		<input type="text" name="uid" placeholder="Username">
                		<input type="text" name="pwd" placeholder="Passowrd">
                		<br>
                		<button type="Submit" name="submitCon">Login</button>        		
                	</form>
                </div>
                
    
                
            </section>

		</div>
        
	
	</body>
</html>
