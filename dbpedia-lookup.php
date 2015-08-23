<?php

// echo $_GET['city'];

$jsonurl = 'http://dbpedia.org/data/' . $_GET['city'] . '.json';
$json = file_get_contents($jsonurl);

$json = json_decode($json);

foreach ($json as $key => $value) {
	if ($key == 'http://dbpedia.org/ontology/populationTotal') {
		echo $key . ' ';
	}
	
}
// var_dump($json);

?>