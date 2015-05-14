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

//Function That Connects to Instagram
// ch = curl handle Thats Returned by curl init
 function connectToInstagram($url){
 	$ch = curl_init();

 	curl_setopt_array($ch, array(
 		CURLOPT_URL => $url,
 		CURLOPT_RETURNTRANSFER => true,
 		CURLOPT_SSL_VERIFYPEER => false,
 		CURLOPT_SSL_VERIFYHOST => 2,

 		 ));
 	$result = curl_exec($ch);
 	curl_close($ch);
 	return $result;
}
//Function to get User id Cause Username Doesnt Allow us to get Pictures
function getUserID($userName) {
$url = 'https://api.instagram.com/v1/users/search?q=' . $userName . '&client_id=' . clientID; //To get ID
$instagramInfo = connectToInstagram($url);
$results = json_decode($instagramInfo, true);

return $results['data']['0']['id'];
}
// Creaye a Function to Prin out Images on our Screen
function printImages($userID) {
	$url = 'https://api.instagram.com/v1/users/' . $userID . '/media/recent?client_id=' . clientID . '&count=5';
	$instagramInfo = connectToInstagram($url);
	$results = json_decode($instagramInfo, true);
	//Parse Through the Information one by one
	foreach ($results['data'] as $items) {
		$image_url = $items['images']['low_resolution']['url'];// Going to go Through all my Results and Give Myself Back the URL of Those Pictures
		//Because we Want to Save it in the PHP Server
		echo '<img src=" '.$image_url . ' "/></br>'; 

	}
}


if (isset($_GET['code'])) {
	$code = ($_GET['code']);
	$url = 'https://api.instagram.com/oauth/access_token';
	$access_token_settings = array('client_id' => clientID, 
								'client_secret' => clientSecret,
								'grant_type' => 'authorization_code',
								'redirect_uri' => redirectURI,
								'code' => $code
								);

//cURL is What we Use in PHP, Its a Library Calls to Other API's
	$curl = curl_init($url);//Setting a cURL Session and we put in $url Because Thats Where we are Getting the Date From
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $access_token_settings);//Setting the Post Fields to the Array Setup That we Created
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);// Setting it Equal to one Because we are Getting Strings Back
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//but in Live Work Production we Want to set This to True


// stores results in $result
$result = curl_exec($curl);
curl_close($curl);

$results = json_decode($result, true);

$userName = $results['user']['username'];

$userID = getUserID($userName);

printImages($userID);
}
else {
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
<?php 
}
 ?>