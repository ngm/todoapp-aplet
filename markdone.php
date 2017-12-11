<?php
session_start();

if (isset($_POST['todo_id']))
{
    if (isset($_SESSION['todos']))
    {
        $_SESSION['todos'][$_POST['todo_id']]['status'] = "DONE";
    }

    header('Location: /index.php');
}

?>
