<?
	$id = $_POST['userId'];

	if (empty($id))
		$id = '08244630d14164caaa2fedc85d';

	$user = '';
	$returnMessage = array();
	$emergencyContacts = array();
	$names = $_POST['names'];
	$numbers = $_POST['numbers'];

	$i = 0;

	while ($i < count($numbers))
	{
		$emergencyContacts[$i]['name'] = trim($names[$i]);
		$emergencyContacts[$i]['number'] = trim($numbers[$i]);
		$i++;
	}

	$query = "update accounts set emergencyContacts = '".json_encode($emergencyContacts)."' where id = '$id'";

	if ($conn->query($query) === TRUE)
	{
		echo "New record created successfully";
	} 
	else 
	{
		echo "Error: " . $query . "<br>" . $conn->error;
	}

?>

