<?php
require_once("settings.php");
// $username = isset($_GET['username']) ? $_GET['username'] : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Email</title>
</head>
<body>

<h2>Update Email for <?php echo htmlspecialchars($username); ?></h2>

<form action="process_update.php" method="POST">
    New Email: <input type="email" name="email" required>
    <input type="submit" value="Update Email">
</form>

</body>
</html>
