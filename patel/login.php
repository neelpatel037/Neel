<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <link rel="stylesheet" href="st.css">
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h2 align="center">Login</h2>
            <form action="login.php" method="POST" align="center">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit" name="login">Login</button>
            </form>
            <div class="switch-form">
                Don't have an account? <a href="register.php">Register</a>
            </div>
        </div>
    </div>

</body>
</html>

<?php
if(isset($_POST["login"]))
{
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "water park";
    $conn = mysqli_connect($host, $user, $pass, $db);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        header("location: hnm.html");
        exit();
    }
    else
    {
        echo "<script>alert('Invalid username or password')</script>";
    }
}
?>
