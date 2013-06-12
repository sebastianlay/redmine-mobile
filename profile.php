<?php

include "functions.inc.php";
include "header.inc.php";

$user = download('/users/current.json')->user;
$updated = false;

// update profile
if(isset($_POST['submit']))
{
	$data = $_POST;
	unset($data['submit']); // remove submit from post data
	$data = array('user' => $data); // wrap in a nice "user"
	$data = json_encode($data);
	uploadJSON('/users/' . $user->id . '.json', $data, 'PUT');
	$updated = true;
}

$user = download('/users/current.json')->user;

?>

<div data-role="page" id="profile">
	<div data-theme="a" data-role="header">
		<a href="index.php?logout=1" data-icon="arrow-l" data-transition="none">Logout</a> 
		<h3>Profil</h3>
	</div>
	<div data-role="content">
		<?php if($updated) { ?>
		<div class="ui-body ui-body-e">
			<p>Profil gespeichert.</p>
		</div>
		<?php } ?>
		<form action="profile.php" method="post" data-ajax="false">
			<div data-role="fieldcontain">
				<label for="firstname">
					Vorname
				</label>
				<input name="firstname" id="firstname" placeholder="Max" value="<?php echo $user->firstname; ?>" type="text">
			</div>
			<div data-role="fieldcontain">
				<label for="lastname">
					Nachname
				</label>
				<input name="lastname" id="lastname" placeholder="Mustermann" value="<?php echo $user->lastname; ?>" type="text">
			</div>
			<div data-role="fieldcontain">
				<label for="mail">
					E-Mail-Adresse
				</label>
				<input name="mail" id="mail" placeholder="max@mustermann.de" value="<?php echo $user->mail; ?>" type="email">
			</div>
			<input data-icon="check" data-theme="b" value="speichern" id="submit" name="submit" type="submit"> 
		</form>
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
					<a href="projects.php" data-transition="none" data-theme="" data-icon="bars">
						Projekte
					</a>
				</li>
				<li>
					<a href="profile.php" data-transition="none" data-theme="" data-icon="gear" class="ui-btn-active ui-state-persist">
						Profil
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php include "footer.inc.php"; ?>