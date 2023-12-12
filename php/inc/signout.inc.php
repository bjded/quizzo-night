<?php
    session_start();

    if (isset($_SESSION['id'])) {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../../");
        exit();
    }
    else {
        header("Location: ../../");
        exit();
    }
?>
