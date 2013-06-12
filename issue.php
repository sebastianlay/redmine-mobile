<?php

include "functions.inc.php";
include "header.inc.php"; 

$id = $_GET['id']; // TODO: validation
$issue = download('/issues/' . $id . '.json?include=journals')->issue;
$name = $issue->project->id;

?>
<div data-role="page" id="issue">
	<div data-theme="a" data-role="header">
		<a href="" data-icon="arrow-l" data-transition="none" data-rel="back">Zurück</a>
		<h3><?php echo $issue->tracker->name; ?></h3>
		<a href="issue-edit.php?id=<?php echo $id; ?>" data-theme="b" data-icon="edit" data-transition="none">Ändern</a>
	</div>
	<div data-role="content">
		<h3><?php echo $issue->subject; ?></h3>
		<p><?php echo $issue->description; ?></p>
		<table>
			<tr>
				<td>Fällig am:</td>
				<td><?php echo empty($issue->due_date) ? '-' : date('d.m.y', strtotime($issue->due_date)); ?></td>
			</tr>
			<tr>
				<td>Status:</td>
				<td><?php echo $issue->status->name; ?></td>
			</tr>
			<tr>
				<td>Priorität:</td>
				<td><?php echo $issue->priority->name; ?></td>
			</tr>
			<tr>
				<td>Zugewiesen an:</td>
				<td><?php echo empty($issue->assigned_to) ? '-' : $issue->assigned_to->name; ?></td>
			</tr>
			<tr>
				<td>Erstellt von:</td>
				<td><?php echo empty($issue->author) ? '-' : $issue->author->name;?></td>
			</tr>
			<tr>
				<td>Erstellt am:</td>
				<td><?php echo date('d.m.y', strtotime($issue->created_on)); ?></td>
			</tr>
		</table>
		
		<ul data-role="listview" data-divider-theme="a" data-inset="true" class="comments">
		<?php foreach ($issue->journals as $journal) { ?>
			<li data-theme="b" data-role="list-divider">
				<?php echo $journal->user->name . ' - ' . date('d.m.y', strtotime($journal->created_on)); ?>
			</li>
			<li data-theme="c">
				<?php if(!empty($journal->notes)) { echo '<p><br />' . $journal->notes . '</p>'; } ?>
				<?php foreach ($journal->details as $detail) { ?>
					<?php echo '<p><br /><strong>' . test($detail->name) . ' geändert</strong><br /><strong>von:</strong> ' . test($detail->old_value) . '<br /><strong>zu:</strong> ' . test($detail->new_value) . '</p>'; ?>
				<?php } ?>
			</li>
		<?php } ?>
		</ul>
	</div>
</div>

<?php include "footer.inc.php"; ?>