<?php include "functions.inc.php"; ?>
<?php include "header.inc.php"; ?>

<div data-role="page" id="projekte">
	<div data-theme="a" data-role="header">
		<a href="index.php?logout=1" data-icon="arrow-l"  data-transition="slide" data-direction="reverse">Logout</a> 
		<h3>
			Projekte
		</h3>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-divider-theme="a" data-inset="true">
			<li data-theme="c">
				<a href="project.php" data-transition="slide">
					Organisation
				</a>
			</li>
			<li data-theme="c">
				<a href="project.php" data-transition="slide">
					Serverwartung
				</a>
			</li>
			<li data-theme="c">
				<a href="project.php" data-transition="slide">
					Veranstaltungsorganisation
				</a>
			</li>
		</ul>
	</div>
	<div data-theme="a" data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="top">
			<ul>
				<li>
					<a href="projects.php" data-transition="fade" data-theme="" data-icon="bars"
					class="ui-btn-active ui-state-persist">
						Projekte
					</a>
				</li>
				<li>
					<a href="profile.php" data-transition="fade" data-theme="" data-icon="gear">
						Profil
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php include "footer.inc.php"; ?>