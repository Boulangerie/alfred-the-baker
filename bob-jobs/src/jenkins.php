<?php
// ****************
//error_reporting(0);
require_once('define.php');
require_once('workflows.php');
$w = new Workflows();

// cache
if ( !file_exists("data.json") || (filemtime("data.json") <= time()-86400*7)) {

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

foreach ($data as $key => $result) {
    preg_match($re, $result->title, $matches);
    if (isset($matches[0])) {
        $w->result( $result->title, $result->url, $result->title, "Click CMD for build, enter to open URL", "jenkins.png" );
    }
}

echo $w->toxml();
?>