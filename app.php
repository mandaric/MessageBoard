<?php

//print_r($_SERVER);

if (isset($_SERVER["PATH_INFO"]))
{
    $path = $_SERVER["PATH_INFO"];
}
else if (isset($_SERVER["REQUEST_URI"]))
{
    $request_uri = $_SERVER["REQUEST_URI"];

    $segments = explode('?', $request_uri);

    //print_r($path);

    $path = $segments[0];
}
else
{
    $path = "/";
}

switch ($path)
{
    case "/":
        require "overview.php";
        break;

    case "/new":
        require "message.php";
        break;

    case "/edit":
        require "message.php";
        break;

    default:
        echo "Invalid route";
        break;
}