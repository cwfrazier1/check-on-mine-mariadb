<?
	$id = $_POST['id'];
	$secret = $_POST['secret'];

	if ($secret == 'falu3a9nLs')
	{
		$query = "delete from actions where comId = '$id'";
		$result = $conn->query($query);

		$query = "delete from accounts where id = '$id'";
		$result = $conn->query($query);
	}
?>
