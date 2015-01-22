<?php

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

//$data = json_encode($_POST);
//
//echo $data;

$file_name = 'messages.json';

$file_content = file_get_contents($file_name);

$contents = json_decode($file_content, true);

if (empty($contents))
{
    $contents = [];
}

$contents[] = $_POST;

$messages = fopen($file_name, 'w');
fwrite($messages, json_encode($contents));
fclose($messages);

require __DIR__ . "/public/form.phtml";

//echo '<pre>';
//print_r($contents);
//echo '</pre>';