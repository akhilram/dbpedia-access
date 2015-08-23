<?php

// echo $_GET['city'];

$jsonurl = 'http://dbpedia.org/data/' . $_GET['city'] . '.json';
$json = file_get_contents($jsonurl);

$json = json_decode($json);
// $json_city = json_decode($json['http://dbpedia.org/resource/Los_Angeles'])

$cityInfo = [];

foreach ($json as $key => $value) {
	if($key == 'http://dbpedia.org/resource/Los_Angeles') {
		foreach ($value as $key1 => $value1) {
			if ($key1 == 'http://dbpedia.org/ontology/populationTotal') {
				$cityInfo["populationTotal"] = $value1[0]->value;
			}
		}
		// $value = json_decode($value);
		
	}
	
}
echo json_encode($cityInfo);
// var_dump($json_city);

?>