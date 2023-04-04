
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css">
  <title>Main Page</title>
</head>
<body>
  <div style="position: absolute;
    left: 85%;
    width: 200px;
    height: 30px;
    border: 3px solid black;
    background-color: gray;">
<a href="/p/login.php">Login/Register</a>
<a href="/p/logout.php">Wyloguj</a>
</div>
<header style="    background-color: #2c3e50; 
    color: white;
    padding: 20px; 
    width: 100%; 
    margin: 0;
    box-sizing: border-box;;;;;;;;;;;;;;;;;;;;">
  <h1>Książki.pl</h1>
</header>
  <table>
    <thead>
      <tr>
        <th>Tytuł</th>
        <th>Liczba Stron</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Establish database connection
      $mysqli = new mysqli("localhost", "root", "", "biblioteka");

      // Retrieve data from database
      $result = $mysqli->query("SELECT * FROM books");
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["book_name"] . "</td><td>"  .$row["pages"] . "</td></tr>";
      }
      ?>
    </tbody>
  </table>
</body>
</html>
