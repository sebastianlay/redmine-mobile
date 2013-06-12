<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>Redmine Mobile</title>
	
	<link rel="icon" href="favicon.ico">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="apple-touch-icon" href="apple-touch-icon.png"/>
	
	<link rel="stylesheet" href="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.css">
	
	<!-- Extra Codiqa features -->
	<link rel="stylesheet" href="codiqa.ext.css">
	
	<!-- jQuery and jQuery Mobile -->
	<script src="https://d10ajoocuyu32n.cloudfront.net/jquery-1.9.1.min.js"></script>
	<script src="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

	<!-- Extra Codiqa features -->
	<script src="https://d10ajoocuyu32n.cloudfront.net/codiqa.ext.js"></script>
	 
</head>
<body <?php if(isset($_GET['wrongcredentials'])) { echo 'class="wrongcredentials"'; } ?>>