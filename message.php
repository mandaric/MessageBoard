<?php

//Full path to the messages. json file is set into this variable
$file = __DIR__ . '/messages.json';

/**
 * Get a specific message based on its id
 * @param int $message_id
 * @return array|null
 */
function getMessage($message_id)
{
    //Getting all messages
    $messages = getMessages();
    //Loop through all messages
    foreach ($messages as $message)
    {
        //Try to find message based on message id
        if ((int) $message['id'] === (int) $message_id)
        {
            return $message;
        }
    }
}

/**
 * Get all messages
 * @return array
 */
function getMessages()
{
    global $file;

    //Loading content into $content variable
    $content = file_get_contents($file);

    if (empty($content))
    {
        $messages = [];
    }
    else
    {
        //Create an array out of json string and load content into $messages
        $messages = json_decode($content, true);
    }

    return $messages;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $messages = getMessages();
    $data = $_POST;

    //If id exists and has a value, message will be edited, otherwise a new message will be created
    if (array_key_exists('id', $data) && empty($data['id']) === false)
    {
        foreach ($messages as $index => $message)
        {
            if ($message['id'] == $data['id'])
            {
                $messages[$index] = $data;
            }
        }
    }
    else
    {
        $data['id'] = count($messages) + 1;
        $messages[] = $data;
    }

    file_put_contents($file, json_encode($messages));

    header('Location: /');
}

//Checking if id exists in query string
if (array_key_exists('id', $_GET) && empty($_GET['id']) === false)
{
    //Lookup for the message by id, from the list of messages
    $data = getMessage($_GET['id']);
}

//Display the form
require __DIR__ . "/views/form.phtml";