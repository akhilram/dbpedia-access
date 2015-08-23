<?php

// echo $_GET['city'];

$jsonurl = 'http://dbpedia.org/data/' . $_GET['city'] . '.json';
$json = file_get_contents($jsonurl);



$resourceKey = 'http://dbpedia.org/resource/' . $_GET['city'];
$populationTotalKey = 'http://dbpedia.org/ontology/populationTotal';
$populationDensityKey = 'http://dbpedia.org/ontology/populationDensity';
$areaTotalKey = 'http://dbpedia.org/ontology/areaTotal';

$json = json_decode($json);
// $json_city = json_decode($json['http://dbpedia.org/resource/Los_Angeles'])

$cityInfo = [];

foreach ($json as $key => $value) {
	if($key == $resourceKey) {
		foreach ($value as $key1 => $value1) {
			if ($key1 == $populationTotalKey) {
				$cityInfo["populationTotal"] = $value1[0]->value;
			}
			if ($key1 == $populationDensityKey) {
				$cityInfo["populationDensity"] = $value1[0]->value;
			}
			if ($key1 == $areaTotalKey) {
				$cityInfo["areaTotal"] = $value1[0]->value;
			}
		}
		// $value = json_decode($value);
		
	}
	
}
echo json_encode($cityInfo);
// var_dump($json_city);

?>