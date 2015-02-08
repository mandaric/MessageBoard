<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $file = __DIR__ . '/messages.json';

    $content = file_get_contents($file);

    if (empty($content))
    {
        $messages = [];
    }
    else
    {
        $messages = json_decode($content, true);
    }

    $data = $_POST;
    if (isset($data['id']))
    {
        foreach ($messages as $index => $message)
        {
            if ($message['id'] == $data['id'])
            {
                $messages[$index] = $data;
            }
        }
    }
    else {
        $data['id'] = count($messages) + 1;
        $messages[] = $data;
    }

    file_put_contents($file, json_encode($messages));

    header('Location: /');
}

if (isset($_GET['id']))
{
    $file = __DIR__ . '/messages.json';

    if (is_file($file))
    {
        $content = file_get_contents($file);
        $messages = json_decode($content, true);

        foreach ($messages as $message)
        {
            if ($message['id'] == $_GET['id'])
            {
                $data = $message;
            }
        }
    }
}
require __DIR__ . "/views/form.phtml";