<?
	//######################################FUNCTIONS############################################
/////B
	function between($varToCheck, $low, $high) 
	{
		if ($varToCheck < $low) 
			return false;
		if ($varToCheck > $high) 
			return false;
		return true;
	}
/////B
/////C
	function convertSeconds($seconds) 
	{
  		$dt1 = new DateTime("@0");
 		$dt2 = new DateTime("@$seconds");
 		return $dt1->diff($dt2)->format('%a days, %h hours, %i minutes and %s seconds');
	}
/////C
/////M
	function makeCall($numbers, $message, $userId)
	{	
		$url = 'https://api.checkonmine.com/makeCall.php';
		$data = array('to' => $numbers, 'message' => serialize($message), 'userId' => $userId);
		$options = array('http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data)));
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		//if ($result === FALSE) 
		//{ /* Handle error */ }
	}
////M
////N
	function notify($userId, $type, $message, $subject=null)
	{
		$url = 'https://api.checkonmine.com/sendNotification.php';
		$data = array('message' => serialize($message), 'userId' => $userId, 'type' => $type, 'subject' => $subject);
		$options = array('http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data)));
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		
	}
////N
////S
	function sendSms($numbers, $message, $userId)
	{	
		$url = 'https://api.checkonmine.com/sendSms.php';
		$data = array('to' => $numbers, 'message' => serialize($message), 'userId' => $userId);
		$options = array('http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data)));
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		//if ($result === FALSE) 
		//{ /* Handle error */ }
	}
/////S
/////U
	function uniqueId($lenght = 26) 
	{
		if (function_exists("random_bytes")) 
		{
			$bytes = random_bytes(ceil($lenght / 2));
		} 
		elseif (function_exists("openssl_random_pseudo_bytes")) 
		{
			$bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
		} 
		else 
		{
			throw new Exception("no cryptographically secure random function available");
		}
		return substr(bin2hex($bytes), 0, $lenght);
	}	
/////U
/////MARIADB
	require_once'/home/ubuntu/check-on-mine-mariadb/includes/mariadb-open.php';
/////MARIADB
////TWILIO
	require_once'/home/ubuntu/check-on-mine-mariadb/includes/sdks/twilio/vendor/autoload.php';
	use Twilio\Rest\Client;
	$account_sid = 'ACc53fa684f8f23605aa3fefe40600b946';
	$auth_token = '772e55e020d9cd992da0fbca330c6420';
	$twilio_number = "+14063447616";
	$twilio = new Client($account_sid, $auth_token);
////TWILIO
////AWS	
	require_once'/home/ubuntu/check-on-mine-mariadb/includes/sdks/aws/vendor/autoload.php';
	$credentials = new Aws\Credentials\Credentials('AKIA47EUSXRZOBMJ5AOL', 'FV2a6MHIgxpZHqB+uWHp7aIFl1YbGWlYPm017rv0');
	$awsW = new Aws\Sdk(['region' => 'us-west-1', 'version' => 'latest', 'credentials' => $credentials]);
	$awsE = new Aws\Sdk(['region' => 'us-east-1', 'version' => 'latest', 'credentials' => $credentials]);
	$ses = new Aws\Ses\SesClient(['version' => 'latest', 'region' => 'us-west-2', 'credentials' => $credentials]);
////AWS	
?>
