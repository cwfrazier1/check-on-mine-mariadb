<?
	$id = $_POST['id'];

	if (empty($id))
		$id = '08244630d14164caaa2fedc85d';

	$user = '';
	$returnMessage = array();
	$emergencyContacts = array();

	$query = "select emergencyContacts from accounts where id = '$id' order by id desc limit 1";
	$result = $conn->query($query);

	while ($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		$emergencyContacts = json_decode($row['emergencyContacts']);
	}

	$contactIndex = $_POST['contactIndex'];

	unset($emergencyContacts[$contactIndex - 1]);

	
	$emergencyContacts = array_values($emergencyContacts);

	$query = "update accounts set emergencyContacts = '".json_encode($emergencyContacts)."' where id = '$id'";

	$conn->query($query);
	
?>

