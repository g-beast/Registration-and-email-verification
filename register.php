<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="widt=device-width, initial-scale=0.8, maximum-scale=1.0, user-scalable=0">
	<title>Lorem ipsum dolor sit.</title>
	<link rel="stylesheet" href="register.css">
    <script src="https://kit.fontawesome.com/d64db55dde.js" crossorigin="anonymous"></script>
</head> 
<body>
	<!-- start of header -->
    <header class="head">
        <a href="#" class="logo">
            <img src="lorem.png" alt="">
        </a>
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>
        <div class="navbar">
            <nav>
                <a href="url to home page">Home</a>
                <a href="url to home page#about">About</a>
                <a href="url to home page#menu">Universities</a>   
            </nav>
        </div> 
    </header>
    <!-- end of header -->
    <div class="container">
        <!-- To display the specific error that has occured START -->
        <?php
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            
                if (strpos($fullUrl, "signup=Passwords") == true) {
                    echo "<p class='error'>Your passwords do not match.</p?";
                    //exit();
                }elseif (strpos($fullUrl, "signup=Email") == true) {
                    echo "<p class='error'>This email id has already regitered.</p?";
                    //exit();
                }elseif (strpos($fullUrl, "signup=verification") == true) {
                    echo "<p class='success'>Thank you for registering with us, check your email for verification to continue. The Email sent might be delivered to your spam emails, kindly check.<br></p?";
                    exit();    
                }elseif (strpos($fullUrl, "signup=failedMail") == true) {
                    echo "<p class='error'>Sorry but we were unable to verify your email,check your details and try again.</p?";
                    //exit();    
                }elseif (strpos($fullUrl, "signup=error") == true) {
                    echo "<p class='error'>Sorry but we were unable to register you, check your details and try again.</p?";
                    //exit();    
                }elseif (strpos($fullUrl, "signup=invalid_acc") == true) {
                    echo "<p class='error'>This Email id is already verified.</p?";
                    //exit();    
                }elseif (strpos($fullUrl, "signup=horribly_wrong") == true) {
                    echo "<p class='error'>Somethinng went horribly wrong!</p?";
                    //exit();    
                }elseif (strpos($fullUrl, "signup=notverified") == true) {
                    echo "<p class='error'>Verify your E-mail to login.<br></p?";
                    exit();    
                }
        ?>
        <!-- To display the specific error that has occured END -->
        
        <h1>Register</h1>
        
       	<form  method = "post" action="a url to the register Controller file" enctype="multipart/form-data" id="register" class="input-group-register">  
       		<input type="text"  name="firstname" class="input-field" placeholder='Firstname' required>
    
       		<input type="text" name="lastname" class="input-field" placeholder='Lastname' required>
    
       		<input type="email" name="email" class="input-field" placeholder='email@gmail.com' required>
    
            <input type="password" name="password" class="input-field" placeholder='password' required>
    
       		<input type="password" name="password_1" class="input-field" placeholder='Confirm password' required>
    
       		<button type="submit" name="regBtn" class="submit-btn">Register</button>
            <button class="loginBtn"><a href="UHB" class="back">Exit</a></button>
    
       	</form>
   	</div>
    <!-- script to control the navigation bar -->
<script type="text/javascript">
    let navbar = document.querySelector('.navbar');

    document.querySelector('#menu-btn').onclick = () =>{
        navbar.classList.toggle('active')
    }
</script>
</body>
</html>