<?php 
    require_once 'functions.php';

    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    
    $mhs = query("SELECT * FROM user");
    if (isset($_POST["search"])) {
        $keyword = $_POST["keyword"];
        $mhs = query("SELECT * FROM user
                WHERE
                nama LIKE '%$keyword%' OR
                usia LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%'");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
</head>
<body>
    <ul>
        <h1>Data User</h1>
        <a href="logout.php">Logout</a>
        <br>
        <br>
        <form action="" method="post">
            <input type="text" name="keyword" id="keyword" size="50" placeholder="Type something..." autofocus autocomplete="off">
            <button type="submit" name="search">Search</button>
        </form>
        <br>
        <a href="add.php">Add New User</a>
        <br>
        <br>
        <table border="1" cellpadding="10" cellspacing="0"> 
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Usia</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1?>
            <?php foreach ($mhs as $row) :?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$row["nama"]?></td>
                    <td><?=$row["usia"]?></td>
                    <td><?=$row["alamat"]?></td>
                    <td><a href="edit.php?id=<?=$row["id"]?>" style="text-decoration:none; color:black">Edit</a> | <a href="delete.php?id=<?=$row["id"]?>"style="text-decoration:none; color:black">Delete</a></td>
                </tr>
                <?php $i++?>
            <?php endforeach;?>
        </table>
    </ul>
</body>
</html>