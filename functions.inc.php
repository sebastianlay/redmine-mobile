<?php

// this has to be the first line!
session_start();

// downloads given resource and returns parsed json
function downloadJSON($path, $url, $username, $password)
{
	// load user data
	$opts = array(
		'http'=>array(
			'method' => "GET",
			'header' => "Authorization: Basic " . base64_encode($username . ':' . $password)
		)
	);
	$context = stream_context_create($opts);
	try
	{
		$file = @file_get_contents($url . $path, false, $context);
		if($file)
			return json_decode($file);
		else
			return '';
	}
	catch (Exception $e)
	{
		return '';
	}
}

// downloads given resource and returns parsed json (using the session variables)
function download($path)
{
	return downloadJSON($path, $_SESSION['url'], $_SESSION['username'], $_SESSION['password']);
}

// uploads json data to the given path
function uploadJSON($path, $data, $method)
{
	$opts = array(
		'http'=>array(
			'method' => $method,
			'header' => "Authorization: Basic " . base64_encode($_SESSION['username'] . ':' . $_SESSION['password']) . "\r\n" .
						"Content-type: application/json",
			'content' => $data
		)
	);
	$context = stream_context_create($opts);
	$file = file_get_contents($_SESSION['url'] . $path, false, $context);
}

// tries to download a resource and extract the user id using the given parameters 
function successfulLogin($url, $username, $password)
{
	try
	{
		// validate input (TODO: do more validation!)
		$url = strip_tags($url);
		$username = strip_tags($username);
		$password = strip_tags($password);

		// load data about current user
		$json = downloadJSON("/users/current.json", $url, $username, $password);

		// retrieve id
		$id = $json->{'user'}->{'id'};
		
		// is id valid?
		if(is_int($id))
		{
			$_SESSION['userid'] = $id;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['url'] = $url;
			return true;
		}
	}
	catch (Exception $e)
	{
		return false;
	}
}

// helper function
function test(&$value)
{
	if(empty($value))
		return '';
	else
		return $value;
}

/**
	Main entry point
**/

// are we logged in?
if(!isset($_SESSION['userid']))
{
	// do we try to log in?
	if(isset($_POST['url']) && isset($_POST['username']) && isset($_POST['password']))
	{
		// are the delivered credentials wrong?
		if(!successfulLogin($_POST['url'], $_POST['username'], $_POST['password']))
			header('Location: index.php?wrongcredentials=1');
	}
	else
	{
		// redirect to login form if we aren't already there
		if(basename($_SERVER['SCRIPT_NAME']) != "index.php")
			header('Location: index.php');
		return;
	}
}

// do we want to log out?
if(isset($_GET['logout']))
{
	// delete all session variables
	$_SESSION = array();
	
	// delete session cookie
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000, $params["path"],
		$params["domain"], $params["secure"], $params["httponly"]
		);
	}

	// destroy session
	session_destroy();
	return;
}

// we are logged in and accessed index page -> redirect to project overview
if(basename($_SERVER['SCRIPT_NAME']) == "index.php")
{
	header('Location: overview.php');
}