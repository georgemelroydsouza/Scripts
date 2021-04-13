<?php

$jsonData = file_get_contents("translations.json");
if ($jsonData === false) {
    // deal with error...
}

$decodedData = json_decode($jsonData, true);
if ($decodedData === null) {
    // deal with error...
}

$duplicatePaths = [];

foreach ($decodedData as $data) {
    
    $path = strtolower($data['path']);
    if (!isset($duplicatePaths[$path]))
    {
        $duplicatePaths[$path] = 0;
    }
    
    $duplicatePaths[$path]++;
}

foreach ($duplicatePaths as $path => $count)
{
    if ((int)$count > 1)
    {
        echo $path . ' --- ' . $count . PHP_EOL;
    }
}