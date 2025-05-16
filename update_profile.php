<?php
require_once("settings.php");
// $username = isset($_GET['username']) ? $_GET['username'] : null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Form was submitted, process the update
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "UPDATE users SET email = '$email' WHERE username = 'Amanuial'";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green;'>✅ Email updated successfully for $username.</p>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . mysqli_error($conn) . "</p>";
    }
} else if (isset($_GET['username'])) {
    // First time loading, show the form
    $username = $_GET['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Email</title>
</head>
<body>
<form action="update_profile.php" method="POST">
    <label>New Email: </label> <input type="email" name="email" required>
    <input type="submit" value="Update Email">
</form>

</body>
</html>


