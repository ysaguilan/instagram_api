<?php 
//Configaration for our PHP Server
set_time_limit(0);
ini_set('default_socket_timeout', 300);
//starts after setting time
session_start();

//Make Constants Using Define
define('clientID', '7b50e23612434a658ce667c6e0ac3b74');
define('clientSecret', 'f1795294356d41468a7970fd9e4147d0');
define('redirectURI', 'http://localhost/appacademyapi/index.php');
define('ImageDirectory', 'pics/');

if isset(($_GET['code'])) {
	$code = ($_GET['code']);
	$url = 'https://api.instagram.com/oauth/access_token';
	$access_token
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- Creating a Login for People to go and Give Approval for Our Web App to Access Their Instagram Account
After Getting Approval we are now Goingto Have the Information so That we can Play With it
 -->
<a href="https:api.instagram.com/oauth/authorize/?client_id=<?php echo clientID; ?>&redirect_uri=<?php echo redirectURI; ?>&response_type=code">LOGIN</a>
</body>
</html>