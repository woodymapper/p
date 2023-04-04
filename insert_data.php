<?php
// Establish database connection
$mysqli = new mysqli("localhost", "root", "", "biblioteka");

// Get form data
$book_name = $_POST["book_name"];
$pages = $_POST["pages"];

if(isset($book_name))
{// Insert data into database
$stmt = $mysqli->prepare("INSERT INTO books (book_name, pages) VALUES (?, ?)");
$stmt->bind_param("si", $book_name, $pages);
$stmt->execute();
}
echo "Dane wklepane do tabeli";
?>