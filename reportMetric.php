<?
        $id = '08244630d14164caaa2fedc85d';

	$metric = $_REQUEST['metric'];
	$value = $_REQUEST['value'];
	$longitude = $_REQUEST['longitude'];
	$latitude = $_REQUEST['latitude'];
	$address = trim($_REQUEST['address']);

//	$metric = 'Device_Usage';
//	$value = 'Mac-Mini';	

	if (!empty($metric) && !empty($value))
	{
		$query = "select accounts.lastCheckedIn AS previousTs, TIMESTAMPDIFF(SECOND, accounts.lastCheckedIn, NOW()) AS timeDifference from accounts where accounts.id = '$id'";

		$result = $conn->query($query);

		$timeDifference = -1;
		$previousTs = -1;

		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$timeDifference = $row['timeDifference'];
			$previousTs = $row['previousTs'];
		}

		$query = "insert into actions (comId, metric, metricValue, timeoutDifference, previousTs) values ('$id', '$metric', '$value', $timeDifference, '$previousTs')";

		if ($conn->query($query) === TRUE)
		{
			echo "New record created successfully";
		} 
		else 
		{
			echo "Error: " . $query . "<br>" . $conn->error;
		}

		$query = "update accounts set lastCheckedIn = CURRENT_TIMESTAMP(), lastCheckedInMetric = '$metric', lastCheckedInMetricValue = '$value' where id = '$id'";


		$result = $conn->query($query);

		if ($conn->query($query) === TRUE)
		{
			echo "New record created successfully";
		} 
		else 
		{
			echo "Error: " . $query . "<br>" . $conn->error;
		}
	}
?>
