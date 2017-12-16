<?php
session_start();

// Read features from config.
$fileHandle = fopen('todo.config','r');
while ($line = fgets($fileHandle)) {
    if (!isset($_SESSION['features']))
    {
        $_SESSION['features'] = array(); 
    }
    $_SESSION['features'][trim($line)] = true;
}
fclose($fileHandle);

function featureIsEnabled($featureName)
{
    return (isset($_SESSION['features'][$featureName]) && $_SESSION['features'][$featureName] == true);
}
?>

<h1>Super Todo Manager</h1>

<h2>Your todos</h2>

<?php
if (isset($_SESSION['todos']))
{
    $todos = $_SESSION['todos'];

    if (featureIsEnabled("Filter"))
    {
        $filter = $_GET['filter'];
        if ($filter != "")
        {
            $todos = array_filter($todos, function($value) use ($filter) { return $value['status'] == $filter; });
        }

        echo "<p>Filter:";
        echo "<a href='./index.php?filter=TODO'>TODO</a> ";
        echo "<a href='./index.php?filter=DONE'>DONE</a> ";
        echo "<a href='./index.php'>NO FILTER</a>";
        echo "</p>";
    }

    if (featureIsEnabled("Filter"))
    {
        $searchTerm = "";
        if (isset($_GET['searchTerm']))
        {
            $searchTerm = $_GET['searchTerm'];
            $todos = array_filter(
                $todos,
                function($value) use ($searchTerm) {
                    return stripos($value['label'], $searchTerm) !== false;
                }
            );
        }


        echo "<p>Search:</p>";
        echo "<form id='search'>";
        echo "<input type='text' name='searchTerm' placeholder='Search term...' value='" . $searchTerm . "' />";
        echo "</form>";
    }

    echo "<ul>";
    foreach ($todos as $index => $todo)
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
