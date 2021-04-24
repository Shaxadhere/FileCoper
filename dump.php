<?php
include_once('config.php');
session_start();
if (!isset($_COOKIE['USER'])) {
    echo "Session does not exists";
}
else{
    echo $_COOKIE['USER'];
}
?>
