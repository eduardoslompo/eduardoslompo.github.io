<?php
require_once('twitteroauth.php');

define('CONSUMER_KEY', 'SnRDTeKH827xnEN3y34PnSlb0');
define('CONSUMER_SECRET', 'YxaAHNEo2hOGHG3LrZHdmcJq5VISVVMy7rKZEShQ9WMed50TGu');
define('ACCESS_TOKEN', '827972747330453505-UfqwdSpO9W1pcfFkWp9JttAxdvvOadL');
define('ACCESS_TOKEN_SECRET', 'wTHEcdBwWeWLFJkfUZ1P3RbbzJsFBdBVZSALtsbDidCWz');

$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
$twitter->host = "http://search.twitter.com/";
$search = $twitter->get('search', array('q' => 'tecnologia', 'rpp' => 2));

$twitter->host = "https://api.twitter.com/1/";
foreach($search->results as $tweet) {
	$status = 'Veja as ultimas noticias do mundo da tecnologia http://everitingtec.blogspot.com/ RT @'.$tweet->from_user.' '.$tweet->text;
	if(strlen($status) > 140) $status = substr($status, 0, 139);
	$twitter->post('statuses/update', array('status' => $status));
}

?>
