<?php
// Connect to the database (use your credentials)
$conn = new mysqli("localhost", "log in name", "password", "mmo_characters");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve characters from the database
$sql = "SELECT * FROM characters";
$result = $conn->query($sql);

echo "<h1>Character List</h1>";
while ($row = $result->fetch_assoc()) {
    echo "<p>ID: " . $row["player_ID"] . " | Name: " . $row["NAME"] . " 
    | Race: " . $row["RACE"] . " | Class: " . $row["CLASS"] . " 
    | <a href='delete_character.php?id=" . $row["player_ID"] . "'>Delete</a></p>";
}

// Add the link to index.php
echo "<p><a href='index.php'>Back to Character Management</a></p>";

$conn->close();
?>
