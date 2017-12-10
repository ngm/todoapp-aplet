<?php
session_start();

if (!isset($_SESSION['todos']))
{
    $_SESSION['todos'] = array(); 
}

$_SESSION['todos'][] = $_GET['label'];

?>