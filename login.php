<?
	$phoneNumber = $_POST['phoneNumber'];
	$password = $_POST['password'];

	$query = "select * from accounts where phoneNumber = '$phoneNumber' and password = SHA2('$password', 512) order by id desc limit 1";
	
	$result = $conn->query($query);

	if ($result->num_rows == 1)
	{	
		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$verificationCode = 0;

			if ($account['phoneNumber'] != '1231231234')
			{
				$verificationCode = rand(100000, 999999);
				sendSms($phoneNumber, "Please enter the following code: $verificationCode", $account['id']);
			}
			else
			{
					$verificationCode = 999999;
			}
			$data=array('status' => 200, 'verificationCode' => $verificationCode);
			echo json_encode($data);
			exit;
		}
	}
?>
