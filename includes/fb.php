<?
require_once('/home/ubuntu/check-on-mine-mariadb/includes/sdks/facebook/vendor/autoload.php');


$fb = new Facebook\Facebook([
 'app_id' => '967773003631552',
 'app_secret' => '0100ce4131c980836b208baafef3b8d1',
 'default_graph_version' => 'v2.2',
]);

//Post property to Facebook
$linkData = [
 'message' => 'This is a test. Working on something'
];
$pageAccessToken ='EAANwLzYay8ABAC7ZCMeeRedm1xYUMlpik3xbsaW418jzpm9CVlYo4QoCj7jrCncWGJe3FRTkIFusUOZBnrgBeMG89OZBk3N69MKyD1ZAPAHNlJSyEBZCescIZBTH5wOylY2WRXLjWpQlyqmy823tiH4kD1EfxRqqrW5wnTZAiZCjuGZCUJNWIG73f';;

try {
 $response = $fb->post('/me/feed', $linkData, $pageAccessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 echo 'Graph returned an error: '.$e->getMessage();
 exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 echo 'Facebook SDK returned an error: '.$e->getMessage();
 exit;
}
$graphNode = $response->getGraphNode();
?>
