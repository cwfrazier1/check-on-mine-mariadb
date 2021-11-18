<?
	$id = $_POST['id'];

	$user = '';
	$returnMessage = array();
	$notes = array();
	$currentMedicalInsurance = $_POST['currentMedicalInsurance'];
	$specialNotes = $_POST['specialNotes'];

	$notes[0]['currentMedicalInsurance'] = $currentMedicalInsurance;
	$notes[0]['specialNotes'] = $specialNotes;

	$query = "update accounts set emergencyNotes = '".json_encode($notes)."' where id = '$id'";

	$conn->query($query);

	echo json_encode($returnMessage);
?>
