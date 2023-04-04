<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css">
  <title>SQL</title>
</head>
<body>
  <h1>Admin Page</h1>
  <form action="insert_data.php" method="post">
    <label for="book_name">Nazwa książki:</label>
    <input type="text" name="book_name" id="book_name"><br>

    <label for="pages">Strony:</label>
    <input type="number" name="pages" id="pages"><br>

    <input type="submit" value="Upload">
  </form>
</body>
</html>
