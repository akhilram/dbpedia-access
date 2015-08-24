<?php

$jsonURL 	= getJSONURL();
$jsonData 	= getJSONData($jsonURL);
$jsonArray 	= getAssociativeArray($jsonData);

$resourceKey 			= 'http://dbpedia.org/resource/' . $_GET['city'];
$populationTotalKey 	= 'http://dbpedia.org/ontology/populationTotal';
$populationDensityKey 	= 'http://dbpedia.org/ontology/populationDensity';
$areaTotalKey 			= 'http://dbpedia.org/ontology/areaTotal';

$cityInfo = [];
$cityInfo["populationTotal"] 	= (string) $jsonArray[$resourceKey][$populationTotalKey][0]['value'];
$cityInfo["populationDensity"] 	= (string) $jsonArray[$resourceKey][$populationDensityKey][0]['value'];
$cityInfo["areaTotal"] 			= (string) $jsonArray[$resourceKey][$areaTotalKey][0]['value'];

echo json_encode($cityInfo);

function getJSONURL() {
	return 'http://dbpedia.org/data/' . $_GET['city'] . '.json';
}

function getJSONData($jsonURL) {
	return file_get_contents($jsonURL);
}

function getAssociativeArray($jsonData) {
	return json_decode($jsonData, true);
}

?>