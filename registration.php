<?php 
    require_once 'functions.php';
    if (isset($_POST["submit"])) {
        if (daftar($_POST) > 0) {
            echo "<script>
                alert('Regristrasi berhasil');
                document.location.href = 'registration.php';
            </script>";
        }
        else
        {
            echo mysqli_error($conn);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        label {
            display:block;
        }
    </style>
</head>
<body>
    <ul>
        <h1>Registration Page</h1>
         <form action="" method="post">
            <label for="username">Username : </label>
            <input type="text" name="username" id="username">
            <br>
            <label for="password">Password : </label>
            <input type="password" name="password" id="password">
            <br>
            <label for="password2">Confirmation Password : </label>
            <input type="password" name="password2" id="password2">
            <br>
            <button type="submit" name="submit">Sign Up</button>
         </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </ul>
</body>
</html>