<?php 
    require_once 'functions.php';

    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    $id = $_GET["id"];

    if (del($id) > 0) {
        echo "<script>
        alert('Data successfully deleted!');
        document.location.href = 'index.php';
        </script>
        ";
    }
    else {
        echo "<script>
        alert('Data failed to delete!');
        document.location.href = 'index.php';
        </script>
        ";
    }