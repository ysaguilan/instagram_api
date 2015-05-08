<?php 
//Configaration for our PHP Server
set_time_limit(0);
ini_set('default_socket_timeout', 300);
//starts after setting time
session_start();

//Make Constants Using Define
define('client_ID', '7b50e23612434a658ce667c6e0ac3b74');
define('client_Secret', 'f1795294356d41468a7970fd9e4147d0');
define('redirectURI', 'http://localhost/appacademyapi/index.php');
define('ImageDirectory', 'pics/');

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- Creating a Login for People to go and Give Approval for Our Web App to Access Their Instagram Account
After Getting Approval we are now Goingto Have the Informationso That we can Play With it
 -->
<a href="https://api.instagram/ouath/authorize/?client_id=<?php echo client_ID; ?>&redirect_uri=<?php echo redirectURI; ?>&response_type=code">LOGIN</a>
</body>
</html>