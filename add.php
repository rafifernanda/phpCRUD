<?php 
    require_once 'functions.php';

    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    
    if (isset($_POST["submit"])) {
        if (add($_POST) > 0) {
            echo "<script>
            alert('Data successfully added!');
            document.location.href = 'index.php';
            </script>
            ";
        }
        else {
            echo "<script>
            alert('Data failed to add!');
            document.location.href = 'index.php';
            </script>
            ";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <ul>
        <h1>Add User</h1>
        <form action="" method="post">
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" required>
            <br>
            <label for="usia">Usia : </label>
            <input type="text" name="usia" id="usia" required>
            <br>
            <label for="alamat">Alamat : </label>
            <input type="text" name="alamat" id="alamat" required>
            <br>
            <button type="submit" name="submit">Save</button>
        </form>
    </ul>
    <a href="index.php">Back to HomePage</a>
</body>
</html>