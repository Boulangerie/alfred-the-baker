<?php
// ****************
//error_reporting(0);
require_once('define.php');
require_once('workflows.php');
$w = new Workflows();

// cache
if ( !file_exists("data.json") || (filemtime("data.json") <= time()-86400*7  || 1)) {

    $data = json_decode($w->request($URL_JOBS));
    $arr = array();
    foreach ($data->jobs as $key => $val) {

        $arr[] = array(
            "url" => $val->url,
			"title" => $val->name
        );
    }
    if (count($arr)) {
        file_put_contents("data.json", json_encode($arr));
    }
}

if (!isset($query)) { $query = urlencode( "format" ); }

$data = json_decode(file_get_contents("data.json"));
$queryParams = explode(" ", $query);
$re = "/" . str_replace(" ", ".*", $query) . "/i";

if (preg_match("/JENKINS_/i", $queryParams)) {
    if ($queryParams === "JENKINS_USER") {

    } else {
        $results = ["JENKINS_USER", "JENKINS_TOKEN", "JENKINS_URL"];
        foreach ($results as $name) {
            $w->result( $name, $name, $name, "Following this command by the value", "jenkins.png" );
        }
    }
} else {

    foreach ($data as $key => $result) {
        preg_match($re, $result->title, $matches);
    	if (isset($matches[0])) {
            $w->result( $result->title, $result->url, $result->title, "Click CMD for build, enter to open URL", "jenkins.png" );
        }
    }
}

echo $w->toxml();
?>