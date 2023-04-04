<?php
// Connect to MySQL database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "biblioteka";
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Registration form submission
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if username already exists
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists!";
    } else {
        // Insert new user into database
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        mysqli_query($conn, $sql);
        header("Location: main.php");
    }
}

// Login form submission
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if username and password match
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
      header("Location: main.php");
    } else {
        echo "Złe Hasło lub Login!";
    }
}
?>

<h1> Utwórz konto za jedyne 0.003XMR</h1>
<!-- HTML registration form -->
<form method="post" action="">
    <label>Username:</label>
    <input type="text" name="username" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    <label>Email:</label>
    <input type="email" name="email" required><br><br>
    <input type="submit" name="register" value="Register">
</form>

<!-- HTML login form -->
<h1> Zaloguj się</h1>
<form method="post" action="">
    <label>Username:</label>
    <input type="text" name="username" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    <input type="submit" name="login" value="Login">
</form>

