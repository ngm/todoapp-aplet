<?php
session_start();
?>

<h1>Super Todo Manager</h1>

<h2>Your todos</h2>

<?php
if (isset($_SESSION['todos']))
{
    echo "<ul>";
    foreach ($_SESSION['todos'] as $index => $todo)
    {
        echo "<form action='./markdone.php' method='post'>";
        echo "<li>";
        echo $todo['status'] == "DONE" ? "DONE " : "";
        echo $todo['label'];
        echo "<input name='todo_id' type='hidden' value=" . $index . " />";
        echo $todo['status'] == "DONE" ? "" : "<button name='MarkDone'>Mark Done</button>";
        echo "</li>";
        echo "</form>";
    }
    echo "</ul>";
}

?>
