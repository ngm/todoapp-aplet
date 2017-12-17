<?php
require_once './functions.php';

session_start();

loadConfig();

if (!isset($_GET['label']) || empty($_GET['label']))
{
    echo "Please enter a label for your todo.";
}

if (!isset($_SESSION['todos']))
{
    $_SESSION['todos'] = array(); 
}

$label = $_GET['label'];
$status = "TODO";
if (isset($_GET['status']) && !empty($_GET['status']))
{
    $status = $_GET['status'];
}
$todo = array('label' => $label, 'status' => $status);

if (featureIsEnabled("DescriptionField"))
{
    if (isset($_GET['description']) && !empty($_GET['description']))
    {
        $description = $_GET['description'];
        $todo['description'] = $description;
    }
}

$_SESSION['todos'][] = $todo;

echo "Todo added.";

?>