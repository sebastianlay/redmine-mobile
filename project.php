<?php

include "functions.inc.php";
include "header.inc.php"; 

$id = $_GET['id']; // TODO: validation
$project = download('/projects/' . $id . '.json?include=trackers')->project;

?>
<div data-role="page" id="project">
	<div data-theme="a" data-role="header" style="text-align:right">
		<a href="projects.php" data-icon="arrow-l" data-transition="slide" data-direction="reverse">Projekte</a> 
		<h3>Projekt</h3>
		<a href="issue-add.php?id=<?php echo $project->id; ?>" data-icon="add" data-transition="slide" data-theme="b">Ticket</a>
	</div>
	<div data-role="content">
		<h3><?php echo $project->name; ?></h3>
		<p><?php echo $project->description; ?></p>
		
		<hr />
		
		<h4>Tickets</h4>
		<table>
			<tr><td></td><td>offen</td><td>gesamt</td></tr>
			<?php
			foreach ($project->trackers as $tracker)
			{
				$open = download('/projects/' . $id . '/issues.json?status_id=open&limit=1&tracker_id=' . $tracker->id);
				$total = download('/projects/' . $id . '/issues.json?status_id=*&limit=1&tracker_id=' . $tracker->id);
				echo '<tr>
					<td>' . $tracker->name . '</td>
					<td>' . $open->total_count . '</td>
					<td>' . $total->total_count . '</td>
					</tr>';
			}
			?>
		</table>
		
		<hr />
		
		<h4>Letzte Änderungen</h4>
		<ul data-role="listview" data-divider-theme="a" data-inset="true">
			<?php
			$latest = download('/projects/' . $id . '/issues.json?status_id=*&sort=updated_on:desc');
			if(!empty($latest))
			{
				foreach ($latest->issues as $issue) { ?>
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
					<a href="project.php?id=<?php echo $id; ?>" data-transition="fade" data-theme="" data-icon="bars" class="ui-btn-active ui-state-persist">
						Übersicht
					</a>
				</li>
				<li>
					<a href="issues.php?id=<?php echo $id; ?>" data-transition="fade" data-theme="" data-icon="gear">
						Tickets
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php include "footer.inc.php"; ?>