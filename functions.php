<?php

$conn = mysqli_connect("localhost", "root", "", "latihanphp");

function query($query)
{
    global $conn;

    $rows = [];
    $result = mysqli_query($conn, $query);
    
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    };
    return $rows;
}

function add($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $usia = htmlspecialchars($data["usia"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "INSERT INTO user (nama, alamat, usia) VALUES ('$nama', '$alamat', $usia)";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function del($id)
{
    global $conn;

    $query = "DELETE FROM user WHERE id=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $usia = htmlspecialchars($data["usia"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "UPDATE user SET nama='$nama', alamat='$alamat', usia=$usia WHERE id=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function daftar($data)
{
    global $conn;

    $username = $data["username"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $query2 = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query2);

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username sudah terdaftar!');
        </script>";
        return false;
    }

    if ($password != $password2) {

        echo "<script>
            alert('Password dan Konfirmasi Password tidak sesuai!');
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password) VALUES('$username', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}