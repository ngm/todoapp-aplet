<?php
session_start();

if (!isset($_SESSION['todos']))
{
    $_SESSION['todos'] = array(); 
}

if (isset($_GET['label']) && !empty($_GET['label'])) {
    $_SESSION['todos'][] = array('label' => $_GET['label'], 'status' => "TODO");
} else {
    echo "Please enter a label for your todo.";
}

?>