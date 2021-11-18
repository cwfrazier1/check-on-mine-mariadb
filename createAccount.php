<?
/*      $id = '08244630d14164caaa2fedc85d';

        $phoneNumber = '6614475919';
        $firstName = 'Chester';
        $lastName = 'Frazier';
        $address = '514 South Kern St';
        $addressLineTwo = '';
        $city = 'Maricopa';
        $state = 'California';
        $zipcode = '93252';
        $emailAddress = 'cwfrazier@cwfrazier.com';
        $password = 'krvg797C8T';
        $newsletter = 1;
 */

	$id = uniqueId();

	$phoneNumber = $_POST['phoneNumber'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$address = $_POST['address'];
	$addressLineTwo= $_POST['addressLineTwo'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipCode = $_POST['zipCode'];
	$emailAddress = $_POST['emailAddress'];
	$password = $_POST['password'];
	$newsletter = $_POST['newsletter'];


        $query = "insert into accounts (id, phoneNumber, firstName, lastName, address, addressLineTwo, city, state, zipcode, emailAddress, password, newsletter) values ('$id', '$phoneNumber', '$firstName', '$lastName', '$address', '$addressLineTwo', '$city', '$state', '$zipCode', '$emailAddress', SHA2('$password', 512), $newsletter)";

	if ($conn->query($query) === TRUE)
	{
		$welcomeEmail = "Dear $firstName,\n\nThank you for signing up for the Check on Mine Beta!\n\nThe goal of this beta first and foremost is to identify any bugs that may have been overlooked in development. If you come across what you think to be a bug or something ought to be working differently, please send an email to support@checkonmine.com, a Facebook message (https://facebook.com/checkonmine), a tweet to @CheckOnMine or on the website at https://checkonmine.com/support\n\nAll of the above methods will automatically create a support ticket which will allow me to track bugs across users.\n\nThe second goal of this beta is to start tracking location information of the users so I can start building out the routine detection algorithms. Apple has recently disabled the ability for apps to request \"Always Allow\" location tracking so this needs to be turned on manually. For instructions on how to do this, go https://checkonmine.com/location\n\nI sincerely appreciate your assistance in helping me test out this new venture!\n\nSincerely,\nChester Frazier";

		$verificationCode = rand(100000, 999999);
		sendSms($phoneNumber, "Please enter the following code: $verificationCode", 'Hso9TMZVejesnBtD3Ixe');
		notify($id, 'email', $welcomeEmail, 'Welcome to the Check on Mine Beta!');

		$data=array('status' => 200, 'verificationCode' => $verificationCode);
		echo json_encode($data);
	} 
	else 
	{
		echo "Error: " . $query . "<br>" . $conn->error;
	}
?>
