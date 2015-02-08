<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $file = __DIR__ . '/messages.json';

    $content = file_get_contents($file);

    if (empty($content))
    {
        $content = [];
    }
    else
    {
        $content = json_decode($content, true);
    }

    $content[] = $_POST;

    file_put_contents($file, json_encode($content));

    header('Location: /');
}

require __DIR__ . "/views/form.phtml";