<?php include "functions.inc.php"; ?>
<?php include "header.inc.php"; ?>

<div data-role="page" id="profil">
	<div data-theme="a" data-role="header">
		<h3>
			Profil
		</h3>
		<a href="profile.php" data-icon="check" data-theme="b" class="ui-btn-right">Speichern</a> 
	</div>
	<div data-role="content">
<form action="projects.php">
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
					<a href="projects.php" data-transition="fade" data-theme="" data-icon="bars">
						Projekte
					</a>
				</li>
				<li>
					<a href="profile.php" data-transition="fade" data-theme="" data-icon="gear"
					class="ui-btn-active ui-state-persist">
						Profil
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php include "footer.inc.php"; ?>