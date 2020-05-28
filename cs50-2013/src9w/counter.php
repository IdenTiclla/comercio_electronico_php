<?php

    /**
     * counter.php
     *
     * David J. Malan
     * malan@harvard.edu
     *
     * Implements a counter.  Demonstrates sessions.
     */
    session_start();

    if (isset($_SESSION['counter'])) {
        $counter = $_SESSION['counter'];
    }
    else{
        $counter = 0;
    }

    $_SESSION['counter'] = $counter + 1;
    

    

?>

<!DOCTYPE html>

<html>
    <head>
        <title>counter</title>
    </head>
    <body>
    <h1>You visited this page <?= $counter?> Times xd.</h1>
    
    </body>
</html>
