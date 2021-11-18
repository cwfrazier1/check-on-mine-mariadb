<?
	$id = $_POST['userId'];
	$number = $_POST['to'];
	$message = unserialize($_POST['message']);

	$twilio->messages->create($number,array('from' => $twilio_number,'body' => $message));
	$json = json_encode([
		'id' => $id,
		'ts' => time(),
		'type' => 'sms',
		'to' => $number,
		'message' => $message
	]);
?>
