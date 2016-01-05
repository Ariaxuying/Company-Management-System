<?php
session_start();
session_destroy();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="layout.css" rel="stylesheet" type="text/css" />
<link href="login.css" rel="stylesheet" type="text/css" />
<!-- Theme Start -->
<link href="styles.css" rel="stylesheet" type="text/css" />
<!-- Theme End -->

</head>
<body>
	<div id="logincontainer">
    	<div id="loginbox">
        	<div id="loginheader">
            	<image src="cp_logo_login.png" alt="Control Panel Login" />
            </div>
            <div id="innerlogin">
                <form action="logintype.php" method="POST">
                	<p>Enter your UserID:</p>
                	<input required type="text" class="logininput"name="userID" />
                    <p>Enter your password:</p>
                	<input required type="password" class="logininput" name="password" />
                        <input type="submit" class="loginbtn" value="Login" /><br/>
                   
                </form>
            </div>
        </div>
        <image src="login_fade.png" alt="Fade" />
    </div>
    

    
 
</body>
</html>



