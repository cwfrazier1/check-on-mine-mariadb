<?
	$phoneNumber = $_POST['phoneNumber'];

	$query = "select id, firstName, lastName, address, addressLineTwo, city, emailAddress, zipCode from accounts where phoneNumber = '$phoneNumber' order by id desc limit 1";

	$userData = array();

	$result = $conn->query($query);

	while ($account = $result->fetch_array(MYSQLI_ASSOC))
	{
		$userData['id'] = $account['id'];
		$userData['firstName'] = $account['firstName'];
		$userData['lastName'] = $account['lastName'];
		$userData['address'] = $account['address'];
		$userData['addressLineTwo'] = $account['addressLineTwo'];
		$userData['city'] = $account['city'];
		$userData['emailAddress'] = $account['emailAddress'];
		$userData['zipCode'] = $account['zipCode'];
	}

	echo json_encode($userData);
?>
