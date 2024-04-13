<?php
// Connect to the database (use your credentials)
$conn = new mysqli("localhost", "log in name", "password", "mmo_characters");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the player ID from the URL parameter
$id = $_GET["id"]; // Use the same parameter name as in view_characters.php

// Prepare the SQL statement
$sql = "DELETE FROM characters WHERE player_ID = ?";

// Below is used to reset AUTO_INCREMENT player_ID in database
$query = "SELECT MAX(player_ID) FROM characters";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$maxValue = $row['MAX(player_ID)'];
$newAutoIncrementValue = $maxValue + 1;
$alterQuery = "ALTER TABLE characters AUTO_INCREMENT = $newAutoIncrementValue";
mysqli_query($conn, $alterQuery);


$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // "i" represents an integer parameter

// Execute the query
if ($stmt->execute()) {
    // Successful deletion
    header("Location: index.php"); // Redirect back to the main page
    exit; // Ensure no further code execution
} else {
    // Error handling (e.g., display an error message)
    echo "Error deleting character: " . $stmt->error;
}
?>
