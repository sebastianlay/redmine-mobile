<?php

include "functions.inc.php";
include "header.inc.php"; 

$user = download('/users/current.json')->user;
$issues = download('/issues.json?status_id=open&limit=100&assigned_to_id=' . $_SESSION['userid']);

?>
<div data-role="page" id="overview">
	<div data-theme="a" data-role="header">
		<a href="index.php?logout=1" data-icon="arrow-l" data-transition="slide" data-direction="reverse">Logout</a> 
		<h3 class="right">Übersicht</h3>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-divider-theme="b">
		<?php
		if(!empty($issues))
		{
			echo '<li data-role="list-divider">Mir zugewiesene Tickets <span class="ui-li-count">' . $issues->total_count . '</span></li>';
			foreach ($issues->issues as $issue) { ?>
				<li data-theme="c">
					<a href="issue.php?id=<?php echo $issue->id; ?>" data-transition="slide">
						<?php echo $issue->subject;
						if(!empty($issue->description))
							echo '<p><br />' . $issue->description . '</p>'; ?>
					</a>
				</li>
		<?php
			}
		}
		?>
		</ul>
	</div>
	<div data-theme="a" data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="top">
			<ul>
				<li>
					<a href="overview.php" data-transition="fade" data-theme="" data-icon="home" class="ui-btn-active ui-state-persist">
						Übersicht
					</a>
				</li>
				<li>
					<a href="projects.php" data-transition="fade" data-theme="" data-icon="bars">
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