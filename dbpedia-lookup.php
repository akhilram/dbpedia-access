<?php

$jsonurl = "http://dbpedia.org/data/Los_Angeles.json";
$json = file_get_contents($jsonurl);
var_dump(json_decode($json));

?>