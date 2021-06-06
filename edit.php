<?php 
    require_once 'functions.php';

    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    $id = $_GET["id"];
    $mhs = query("SELECT * FROM user WHERE id=$id")[0];
    if (isset($_POST["submit"])) {
        if (edit($_POST)) {
            echo "<script>
            alert('Data successfully change!');
            document.location.href = 'index.php';
            </script>
            ";
        }
        else {
            echo "<script>
            alert('Data failed to change!');
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
    <title>Edit User</title>
</head>
<body>
    <ul>
        <h1>Edit User</h1>
        <form action="" method="post">
            <input type="hidden" name="id" id="id" value="<?=$mhs["id"]?>">
            <br>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" value="<?=$mhs["nama"]?>" required>
            <br>
            <label for="alamat">Alamat : </label>
            <input type="text" name="alamat" id="alamat" value="<?=$mhs["alamat"]?>" required>
            <br>
            <label for="usia">Usia : </label>
            <input type="text" name="usia" id="usia" value="<?=$mhs["usia"]?>" required>
            <br>
            <button type="submit" name="submit">Save</button>
        </form>
    </ul>
    <a href="index.php">Back to HomePage</a>
</body>
</html>