<?php

function loadConfig()
{
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
}


function featureIsEnabled($featureName)
{
    return (isset($_SESSION['features'][$featureName]) && $_SESSION['features'][$featureName] == true);
}

?>