<?php 
//Configaration for our PHP Server
set_time_limit(0);
ini_set('default_socket_timeout', 300);
//starts after setting time
session_start();

//Make Constants Using Define
define('client_id', '7b50e23612434a658ce667c6e0ac3b74');
define('client_secret', 'f1795294356d41468a7970fd9e4147d0');
define('redirectURI', 'http://localhost/appacademyapi/index.php');
define('ImageDirectory', 'pics/');

 ?>
<!-- 
CLIENT INFO
CLIENT ID	7b50e23612434a658ce667c6e0ac3b74
CLIENT SECRET	f1795294356d41468a7970fd9e4147d0
WEBSITE URL	http://localhost/appacademyapi/index.php
REDIRECT URI	http://localhost/appacademyapi/index.php -->