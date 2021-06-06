<?php 
    require_once 'functions.php';

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"])){

                session_start();
                $_SESSION["login"] = true;
                header("Location: index.php");
                exit;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <ul>
        <h1>Halaman Login</h1>
        <form action="" method="post">
            <label for="username">Username: </label>
            <input type="text" name="username" id="username">
            <br>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password">
            <br>
            <button type="submit" name="login">Login</button>
        </form>

    <p>You dont have any account? <a href="registration.php">Register</a></p>
    
    </ul>
</body>
</html>