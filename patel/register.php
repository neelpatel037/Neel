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
    <div class="form-container" id="register-form">
        <h2 align="center">Register</h2>
        <form action="register.php" method="POST" align="center">
            <input type="text" name="name" placeholder="Name" required><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
            <button type="submit" name="register">Register</button>
        </form>
        <div class="switch-form">
            Already have an account? <a href="login.php">Login</a>
        </div>
    </div>
 </div>
</body>
</html>

<?php
if(isset($_POST["register"]))
{
    $host="localhost";
    $user="root";
    $pass="";
    $db="water park";
    $conn=mysqli_connect($host,$user,$pass,$db);

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpass = $_POST['confirm_password'];

    if($password == $cpass)
    {
        $sql = "INSERT INTO `users`(`name`, `username`, `password`) VALUES ('$name','$username','$password')";
        $result = mysqli_query($conn, $sql);
        header('location:login.php');
    }
    else
    {
        echo "<script>alert('Password does not match')</script>";
    }
}
?>
