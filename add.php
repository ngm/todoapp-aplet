<?php
session_start();

if (!isset($_SESSION['todos']))
{
    $_SESSION['todos'] = array(); 
}

if (isset($_GET['label']) && !empty($_GET['label']))
{
    $label = $_GET['label'];
    $status = "TODO";
    if (isset($_GET['status']) && !empty($_GET['status']))
    {
        $status = $_GET['status'];
    }
    $_SESSION['todos'][] = array('label' => $label, 'status' => $status);
}
else
{
    echo "Please enter a label for your todo.";
}

?>