<?php
// Connect to the database (use your credentials)
$conn = new mysqli("localhost", "log in name", "password", "mmo_characters");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize input data (to prevent SQL injection)
$name = $_POST["name"];
$race = $_POST["race"];
$class = $_POST["class"];
// The variables "name" "race" and "class" are pulled from the index.php name="values"
// they need to match

// below will be used to reset value of AUTO-INCREMENT player_ID value
$query = "SELECT MAX(player_ID) FROM characters";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$maxValue = $row['MAX(player_ID)'];
$newAutoIncrementValue = $maxValue + 1;
$alterQuery = "ALTER TABLE characters AUTO_INCREMENT = $newAutoIncrementValue";
mysqli_query($conn, $alterQuery);

// Insert character into the database
$stmt = $conn->prepare("INSERT INTO characters (NAME, RACE, CLASS) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $race, $class);
if ($stmt->execute()) {
    // Success
    header("Location: index.php");
} else {
    echo "Error: " . $stmt->error;
}
$conn->close();
?>
