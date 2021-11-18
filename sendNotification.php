<?
use Twilio\Rest\Client;

$userId = $_POST['userId'];		
$type = $_POST['type'];		
$message = unserialize($_POST['message']);
$subject = $_POST['subject'];		
$to = '';

$userId = '08244630d14164caaa2fedc85d8';		
$type = 'sms';	
$message = 'message';
$subject = 'subject';		
$to = '';

$iOSToken = '';

$iterator = $ddb->getIterator('Query',array('TableName' => 'accounts','KeyConditions' => array('id' => array('AttributeValueList' => array(array('S' => $userId)),'ComparisonOperator' => 'EQ'))));

	foreach ($iterator as $item)
	{
		$phonenumber = $item['phonenumber']['s'];
		$emailAddress = $item['emailAddress']['S'];
		$iOSToken = $item['iOSToken']['S'];
	}

if ($type == 'apn')
{
	$binding = $twilio->notify->v1->services($is)->bindings->create($userId, "apn", $iOSToken);
	$notification = $twilio->notify->v1->services($is)->notifications->create(["body" => $message,"identity" => [$userId], 'binding_type' => 'apn']);
	$to = $iOSToken;
}

if ($type == 'sms')
{
	$twilio->messages->create("+1".$phoneNumber,array('from' => $twilio_number,'body' => $message));
	$to = $phoneNumber;
}

if ($type == 'call')
{
	$call = $twilio->calls->create("+1".$phoneNumber, $twilio_number,["twiml" => "<Response><Pause length=\"2\"/><Say>$message</Say></Response>"]);
	$to = $phoneNumber;
}

if ($type == 'email')
{
	$char_set = 'UTF-8';

	try 
	{
		$result = $ses->sendEmail(['Destination' => ['ToAddresses' => array($emailAddress),],'ReplyToAddresses' => ['support@checkonmine.com'],'Source' => 'Check on Mine <support@checkonmine.com>','Message' => ['Body' => ['Text' => ['Charset' => $char_set,'Data' => $message,],], 'Subject' => ['Charset' => $char_set,'Data' => $subject,],],]);
		$messageId = $result['MessageId'];
	} 
	catch (AwsException $e) 
	{
		echo $e->getMessage();
		echo("The email was not sent. Error message: ".$e->getAwsErrorMessage()."\n");
		echo "\n";
	}
	$to = $emailAddress;
}
?>
