<?php

$file = __DIR__ . '/messages.json';

if (is_file($file))
{
    $content = file_get_contents($file);
    $messages = json_decode($content, true);
}

require __DIR__ . "/views/messages.phtml";