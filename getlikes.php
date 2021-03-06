<?php
	if(!session_id()) {
	    session_start();
	}
	// require_once __DIR__ . '/vendor/autoload.php';
	require( __DIR__.'/Facebook/autoload.php' );
	require('facebookCred.php');
	use Facebook\FacebookRequest;

	$fbApp=new Facebook\FacebookApp($AppID,$AppSecret);
	$fb=new Facebook\Facebook([
		'app_id' => $AppID,
		'app_secret' => $AppSecret,
		'default_graph_version' => 'v2.5']);

	function getFriends(string $accessToken,Facebook\FacebookApp $fbApp,Facebook\Facebook $fb){
		$request = new FacebookRequest(
			$fbApp,
			$accessToken,
			$session,
		    'GET',
		    '/{user-id}/likes'
		);
		try{
			$response = $request->execute();
			$graphObject = $response->getGraphObject();
			// var_dump($graphObject);
			echo "$graphObject";
		}
		catch(\Facebook\Exceptions\FacebookSDKException $e){
			echo 'Error: ' . $e->getMessage();
			exit;
		}
	}

		
		
		/* handle the result */


	$accessToken=(string)($argv[1]);
	print $accessToken;
	if(isset($accessToken)){
		echo "$accessToken\n";
		getFriends($accessToken,$fbApp,$fb);
	}
	else{
		echo 'Error: No accessToken passed.';
	}


