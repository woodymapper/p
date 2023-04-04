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
        session_start();
$_SESSION['username'] = $username;
$_SESSION['logged_in'] = true;
// Check if the user is an admin
if($_SESSION['role'] === 'admin') {
  // Redirect to the admin panel
  header("Location: admin.php");
  exit();
}

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
      session_start();
$_SESSION['username'] = $username;
$_SESSION['logged_in'] = true;
// Check if the user is an admin
if($_SESSION['role'] === 'admin') {
  // Redirect to the admin panel
  header("Location: admin.php");
  exit();
}else

      header("Location: main.php");

      // Check if the user is an admin



    } else {
        echo "Złe Hasło lub Login!";
    }
}
?>