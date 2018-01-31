<?php 
header("Content-type: application/json");
if(isset($_GET['url'])) {
$subject = curldo($_GET['url']);
$pattern = '/id\=([0-9]{15})/';
preg_match($pattern, $subject, $matches);
if(is_null($matches[1])) {
	echo "Can not find your Fanpage Id";
} else {
	echo json_encode($matches[1]);
}
} else {
	echo "!Results";
}

function curldo($url) {
		$curl  = curl_init();
		curl_setopt_array($curl, Array(
			CURLOPT_URL => $url,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_HTTPHEADER => array("Content-Type: application/x-www-form-urlencoded"),
			CURLOPT_USERAGENT	=> "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => false,
			CURLOPT_TIMEOUT => 13,
		));
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}