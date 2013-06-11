<?php include "functions.inc.php"; ?>
<?php include "header.inc.php"; ?>

<div data-role="page" id="projekt">
	<div data-theme="a" data-role="header">
		<a href="projects.php" data-icon="arrow-l" data-transition="slide" data-direction="reverse">Projekte</a> 
		<h3>
			Projekt
		</h3>
	</div>
	<div data-role="content">
	</div>
	<div data-theme="a" data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="top">
			<ul>
				<li>
					<a href="project.php" data-transition="fade" data-theme="" data-icon="bars"
					class="ui-btn-active ui-state-persist">
						Übersicht
					</a>
				</li>
				<li>
					<a href="tickets.php" data-transition="fade" data-theme="" data-icon="gear">
						Tickets
					</a>
				</li>
				<li>
					<a href="wiki.php" data-transition="fade" data-theme="" data-icon="gear">
						Wiki
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php include "footer.inc.php"; ?>