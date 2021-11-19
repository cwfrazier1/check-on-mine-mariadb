<?
	$dbHost = 'mdb.cwfrazier.com';
	$dbUser = 'admin';
	$dbPassword = '9ZGecLr5hADwek';
	$dbName = 'com';

	$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

	if ($conn -> connect_errno) 
	{
  		echo "Failed to connect to MySQL: " . $conn -> connect_error;
 		exit();
	}
?>

