<?php

include "functions.inc.php";
include "header.inc.php"; 

$id = $_GET['id']; // TODO: validation
$latest = -1;

// update ticket
if(isset($_POST['submit']))
{
	$data = $_POST;
	unset($data['submit']); // remove submit from post data
	$data['project_id'] = intval($id);
	if(empty($data['assigned_to_id'])) // if the ticket isn't assigned to anybody
		$data['assigned_to_id'] = '';
	else
		$data['assigned_to_id'] = intval($data['assigned_to_id']); // convert to number
	$data = array('issue' => $data); // wrap in a nice "issue"
	$data = json_encode($data);
	uploadJSON('/issues.json', $data, 'POST');
	$latest = download('/issues.json?sort=created_on:desc&limit=1')->issues[0]->id;
}

?>
<div data-role="page" id="project">
	<div data-theme="a" data-role="header">
		<a href="" data-icon="arrow-l" data-transition="none" data-rel="back">Zurück</a>
		<h3 class="right">Neues Ticket</h3>
	</div>
	<div data-role="content">
		<?php if($latest >= 0) { ?>
		<div class="ui-body ui-body-e">
			<p><a href="issue.php?id=<?php echo $latest; ?>">Ticket #<?php echo $latest; ?></a> wurde angelegt.<br /></p>
		</div>
		<?php } ?>
		<form action="issue-add.php?id=<?php echo $id; ?>" method="post" data-ajax="false">
			<div data-role="fieldcontain">
				<label for="subject">
					Titel
				</label>
				<input name="subject" id="subject" value="" type="text">
			</div>
			<div data-role="fieldcontain">
				<label for="description">
					Beschreibung
				</label>
				<textarea name="description" id="description"></textarea>
			</div>
			<div data-role="fieldcontain">
				<label for="status_id">Status</label>
				<select name="status_id" id="status_id">
					<option value="1">Neu</option>
					<option value="2">In Arbeit</option>
					<option value="3">Gelöst</option>
					<option value="4">Rückmeldung</option>
					<option value="5">Geschlossen</option>
					<option value="6">Zurückgewiesen</option>
				</select>
			</div>
			<div data-role="fieldcontain">
				<label for="assigned_to_id">Zugewiesen an</label>
				<select name="assigned_to_id" id="assigned_to_id">
					<?php
					$users = download('/users.json?limit=100')->users;
					echo '<option value=""></option>';
					foreach ($users as $user) {
						echo '<option value="' . $user->id . '">' . $user->firstname . ' ' . $user->lastname . "</option>\n";
					}
					?>
				</select>
			</div>
			<input data-icon="check" data-theme="b" value="anlegen" id="submit" name="submit" type="submit">
		</form>
	</div>
</div>

<?php include "footer.inc.php"; ?>