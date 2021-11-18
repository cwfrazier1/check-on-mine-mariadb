<?
	$dbHost = 'sql.checkonmine.com';
	$dbUser = 'root';
	$dbPassword = '5cJiVspoAndrkc';
	$dbName = 'com';

	$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

	if ($conn -> connect_errno) 
	{
  		echo "Failed to connect to MySQL: " . $conn -> connect_error;
 		exit();
	}
?>

