<?php
// ****************
//error_reporting(0);
require_once('define.php');

$query = "https://jenkins.teads.net/job/service-format-framework_master/";
$re = "/job\\/([^\\/]*)/i"; 
preg_match_all($re, $query, $matches);

$url = str_replace("https://", "https://" . $JENKINS_USER . ":" . $JENKINS_TOKEN . "@", $query) . "buildWithParameters";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

echo curl_exec($ch);

if ($matches[1] && $matches[1][0]) {
	echo $matches[1][0];
} else {
	echo $query;
}
?>