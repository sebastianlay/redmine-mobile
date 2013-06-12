<?php

include "functions.inc.php";
include "header.inc.php"; 

$id = $_GET['id']; // TODO: validation

// update ticket
if(isset($_POST['submit']))
{
	$data = $_POST;
	unset($data['submit']); // remove submit from post data
	$data['assigned_to_id'] = intval($data['assigned_to_id']); // convert to number
	$data = array('issue' => $data); // wrap in a nice "issue"
	$data = json_encode($data);
	uploadJSON('/issues/' . $id . '.json', $data, 'PUT');
}

$issue = download('/issues/' . $id . '.json')->issue;

?>
<div data-role="page" id="issue-edit">
	<div data-theme="a" data-role="header">
		<a href="" data-icon="arrow-l" data-transition="slide" data-direction="reverse" data-rel="back">Zurück</a>
		<h3 class="right"><?php echo $issue->subject; ?></h3>
	</div>
	<div data-role="content">
		<form action="issue-edit.php?id=<?php echo $id; ?>" method="post" data-ajax="false">
			<div data-role="fieldcontain">
				<label for="subject">
					Titel
				</label>
				<input name="subject" id="subject" value="<?php echo $issue->subject; ?>" type="text">
			</div>
			<div data-role="fieldcontain">
				<label for="description">
					Beschreibung
				</label>
				<textarea name="description" id="description"><?php echo $issue->description; ?></textarea>
			</div>
			<div data-role="fieldcontain">
				<label for="status_id">Status</label>
				<select name="status_id" id="status_id">
					<option value="1" <?php echo $issue->status->id == 1 ? 'selected' : ''; ?>>Neu</option>
					<option value="2" <?php echo $issue->status->id == 2 ? 'selected' : ''; ?>>In Arbeit</option>
					<option value="3" <?php echo $issue->status->id == 3 ? 'selected' : ''; ?>>Gelöst</option>
					<option value="4" <?php echo $issue->status->id == 4 ? 'selected' : ''; ?>>Rückmeldung</option>
					<option value="5" <?php echo $issue->status->id == 5 ? 'selected' : ''; ?>>Geschlossen</option>
					<option value="6" <?php echo $issue->status->id == 6 ? 'selected' : ''; ?>>Zurückgewiesen</option>
				</select>
			</div>
			<div data-role="fieldcontain">
				<label for="assigned_to_id">Zugewiesen an</label>
				<select name="assigned_to_id" id="assigned_to_id">
					<?php
					$users = download('/users.json?limit=100')->users;
					foreach ($users as $user) {
						echo '<option value="' . $user->id . '" ' . ($issue->assigned_to->id == $user->id ? 'selected' : '') . '>' . $user->firstname . ' ' . $user->lastname . "</option>\n";
					}
					?>
				</select>
			</div>
			<input data-icon="check" data-theme="b" value="speichern" id="submit" name="submit" type="submit">
		</form>
	</div>
</div>

<?php include "footer.inc.php"; ?>