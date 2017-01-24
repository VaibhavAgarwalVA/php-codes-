<?php
	//require_once __DIR__ . '/vendor/autoload.php';
	//require_once __DIR__ . '/path/to/facebook-php-sdk-v4/src/Facebook/autoload.php';
	session_start();
	require( __DIR__.'/Facebook/autoload.php' );
	require('facebookCred.php');

	$fb=new Facebook\Facebook([
		'app_id' => $AppID,
		'app_secret' => $AppSecret,
		'default_graph_version' => 'v2.5']);

	$helper=$fb->getRedirectLoginHelper();
	$permissions=['emai','user_likes'];
	$loginUrl=$helper->getLoginUrl('http://localhost:8080/promptLogin.php',$permissions);
	echo $loginUrl;