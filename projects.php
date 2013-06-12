<?php

include "functions.inc.php";
include "header.inc.php"; 

$json = download('/projects.json');
$projects = $json->projects;

?>

<div data-role="page" id="projects">
	<div data-theme="a" data-role="header">
		<a href="index.php?logout=1" data-icon="arrow-l" data-transition="none">Logout</a> 
		<h3 class="right">Projekte</h3>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-divider-theme="a">
			<?php foreach ($projects as $project) { ?>
			<li data-theme="<?php echo empty($project->parent->name) ? 'b' : 'c'; ?>">
				<a href="project.php?id=<?php echo $project->id; ?>" data-transition="none">
					<?php
					echo $project->name;
					$total = download('/projects/' . $project->identifier . '/issues.json?status_id=open&limit=1');
					if(!empty($total->total_count))
						echo '<span class="ui-li-count">' . $total->total_count . '</span>';
					if(!empty($project->description))
							echo '<p><br />' . $project->description . '</p>';
					?>
				</a>
			</li>
			<?php } // end foreach ?>
		</ul>
	</div>
	<div data-theme="a" data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="top">
			<ul>
				<li>
					<a href="overview.php" data-transition="none" data-theme="" data-icon="home">
						Übersicht
					</a>
				</li>
				<li>
					<a href="projects.php" data-transition="none" data-theme="" data-icon="bars" class="ui-btn-active ui-state-persist">
						Projekte
					</a>
				</li>
				<li>
					<a href="profile.php" data-transition="none" data-theme="" data-icon="gear">
						Profil
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php include "footer.inc.php"; ?>