<?php

//echo '<pre>';
//print_r($_SERVER);
//echo '</pre>';

if (isset($_SERVER["PATH_INFO"]))
{
    $path = $_SERVER["PATH_INFO"];
}
else
{
    $path = "/";
}

switch ($path)
{
    case "/":
        require "messages.php";
        break;

    case "/new":
        require "message.php";
        break;

    default:
        echo "Invalid route";
        break;
}