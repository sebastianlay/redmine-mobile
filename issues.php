<?php

include "functions.inc.php";
include "header.inc.php"; 

$id = $_GET['id']; // TODO: validation

?>
<div data-role="page" id="issues">
	<div data-theme="a" data-role="header" style="text-align:right">
		<a href="projects.php" data-icon="arrow-l" data-transition="none">Projekte</a> 
		<h3>Tickets</h3>
		<a href="issue-add.php?id=<?php echo $id; ?>" data-icon="add" data-transition="none" data-theme="b">Ticket</a>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-divider-theme="a">
		<?php
		$json = download('/projects/' . $id . '/issues.json?status_id=open&limit=100');
		if(!empty($json))
		{
			foreach ($json->issues as $issue) { ?>
				<li data-theme="c">
					<a href="issue.php?id=<?php echo $issue->id; ?>" data-transition="none">
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
					<a href="project.php?id=<?php echo $id; ?>" data-transition="none" data-theme="" data-icon="bars">
						Übersicht
					</a>
				</li>
				<li>
					<a href="issues.php?id=<?php echo $id; ?>" data-transition="none" data-theme="" data-icon="gear" class="ui-btn-active ui-state-persist">
						Tickets
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php include "footer.inc.php"; ?>