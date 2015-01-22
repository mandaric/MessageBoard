<?php

$messages = file_get_contents('messages.json');
$messages = json_decode($messages, true);

require __DIR__ . "/public/messages.phtml";