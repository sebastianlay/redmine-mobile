<?php

// this has to be the first line!
session_start();

function SuccessfulLogin()
{
	try
	{
		// validate input (TODO: do more validation!)
		$url = strip_tags($_POST['url']);
		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);

		// load user data
		$opts = array(
			'http'=>array(
				'method' => "GET",
				'header' => "Authorization: Basic " . base64_encode($username . ':' . $password)
			)
		);
		$context = stream_context_create($opts);
		$file = file_get_contents($url . "/users/current.json", false, $context);
		
		// parse json
		$json = json_decode($file);

		// retrieve id
		$id = $json->{'user'}->{'id'};
		
		// is id valid?
		if(is_int($id))
		{
			$_SESSION['userid'] = $id;
			$_SESSION['url'] = $url;
			return true;
		}
	}
	catch (Exception $e)
	{
		return false;
	}
}

// are we logged in?
if(!isset($_SESSION['userid']))
{
	// do we try to log in?
	if(isset($_POST['url']) && isset($_POST['username']) && isset($_POST['password']))
	{
		// are the delivered credentials wrong?
		if(!SuccessfulLogin())
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
	header('Location: projects.php');
}

echo $_SESSION['userid'];