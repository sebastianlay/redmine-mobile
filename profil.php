<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>RedmineMobile</title>
	<link rel="stylesheet" href="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.css">

	<!-- Extra Codiqa features -->
	<link rel="stylesheet" href="codiqa.ext.css">

	<!-- jQuery and jQuery Mobile -->
	<script src="https://d10ajoocuyu32n.cloudfront.net/jquery-1.9.1.min.js"></script>
	<script src="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

</head>
<body>
<!-- Home -->
<div data-role="page" id="page1">
	<div data-theme="a" data-role="header">
		<h3>
			Profil
		</h3>
		<a href="profil.html" data-icon="check" data-theme="b" class="ui-btn-right">Speichern</a> 
	</div>
	<div data-role="content">
<form action="projekte.html">
			<div data-role="fieldcontain">
				<label for="textinput1">
					Vorname
				</label>
				<input name="" id="textinput1" placeholder="Max" value="" type="text">
			</div>
			<div data-role="fieldcontain">
				<label for="textinput2">
					Nachname
				</label>
				<input name="" id="textinput2" placeholder="Mustermann" value="" type="text">
			</div>
			<div data-role="fieldcontain">
				<label for="textinput3">
					E-Mail-Adresse
				</label>
				<input name="" id="textinput3" placeholder="max@mustermann.de" value="" type="email">
			</div>
		</form>
	</div>
	<div data-theme="a" data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="top">
			<ul>
				<li>
					<a href="projekte.html" data-transition="fade" data-theme="" data-icon="bars">
						Projekte
					</a>
				</li>
				<li>
					<a href="profil.html" data-transition="fade" data-theme="" data-icon="gear"
					class="ui-btn-active ui-state-persist">
						Profil
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>
