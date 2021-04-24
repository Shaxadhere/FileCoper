<?php
include_once('config.php');
session_start();
// if (!isset($_SESSION['MANAGER'])) {
    // redirectWindow("auth/index");
    showAlert(json_encode($_SESSION['MANAGER']));
// }
?>
