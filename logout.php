<?php
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['logged_in'] = true;
    header("Location: main.php");
      
          


?>