<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MMO Character Entry Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Character Management</h1>
    <form action="add_character.php" method="post">
        <input type="text" name="name" placeholder="Character Name" required>
        <input type="text" name="race" placeholder="Race" required>
        <input type="text" name="class" placeholder="Class" required>
        <button type="submit">Add Character</button>
    </form>
    <a href="view_characters.php">View Characters</a>
</body>
</html>