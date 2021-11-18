<?
	$dbHost = 'localhost';
	$dbUser = 'root';
	$dbPassword = '5Rq^U&FvX$8JpG';
	$dbName = 'com';

	$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

	if ($conn -> connect_errno) 
	{
  		echo "Failed to connect to MySQL: " . $conn -> connect_error;
 		exit();
	}
?>

