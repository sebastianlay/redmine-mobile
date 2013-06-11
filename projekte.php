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
			Projekte
		</h3>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-divider-theme="a" data-inset="true">
			<li data-theme="c">
				<a href="projekt.html" data-transition="slide">
					Organisation
				</a>
			</li>
			<li data-theme="c">
				<a href="projekt.html" data-transition="slide">
					Serverwartung
				</a>
			</li>
			<li data-theme="c">
				<a href="projekt.html" data-transition="slide">
					Veranstaltungsorganisation
				</a>
			</li>
		</ul>
	</div>
	<div data-theme="a" data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="top">
			<ul>
				<li>
					<a href="projekte.html" data-transition="fade" data-theme="" data-icon="bars"
					class="ui-btn-active ui-state-persist">
						Projekte
					</a>
				</li>
				<li>
					<a href="profil.html" data-transition="fade" data-theme="" data-icon="gear">
						Profil
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>
