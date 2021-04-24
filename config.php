<?php

function getHTMLRoot()
{
    return "/elfinder";
}

function getServerRoot()
{
    return $_SERVER['HTTP_HOST'] . "/elfinder";
}

function connect()
{
    $server = "localhost";
    $usr = "root";
    $pass = "";
    $data = "arttedu_lecture_manager";
    $connection = mysqli_connect($server, $usr, $pass, $data) or die("failed to connect to database");
    return ($connection);
}

include_once('assets/vendor/phprapid/rapid.php');
