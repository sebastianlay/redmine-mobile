<?php include "functions.inc.php"; ?>
<?php include "header.inc.php"; ?>

<div data-role="page" id="index">
	<div data-theme="a" data-role="header">
		<h3 class="custom-header">
			Redmine Mobile
		</h3>
	</div>
	<div data-role="content">
		<form action="projects.php" method="post" data-ajax="false">
			<div class="ui-body ui-body-e" id="wrongcredentials">
				<p>Zugangsdaten sind falsch!</p>
			</div>
			<div data-role="fieldcontain">
				<label for="url">
					Redmine URL
				</label>
				<input name="url" id="url" placeholder="http://projects.acagamics.cs.uni-magdeburg.de" value="http://projects.acagamics.cs.uni-magdeburg.de" type="url">
			</div>
			<div data-role="fieldcontain">
				<label for="username">
					Benutzername
				</label>
				<input name="username" id="username" placeholder="Max Mustermann" value="" type="text">
			</div>
			<div data-role="fieldcontain">
				<label for="password">
					Passwort
				</label>
				<input name="password" id="password" placeholder="GeheimesPasswort123" value="" type="password">
			</div>
			<input data-icon="arrow-r" data-iconpos="right" value="Login" type="submit">
		</form>
	</div>
</div>

<?php include "footer.inc.php"; ?>