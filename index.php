<?php
session_start();
?>

<h1>Super Todo Manager</h1>

<h2>Your todos</h2>

<?php
if (isset($_SESSION['todos']))
{
    echo "<ul>";
    foreach ($_SESSION['todos'] as $label)
    {
        echo "<li>" . $label . "</li>";
    }
    echo "</ul>";
}

?>
