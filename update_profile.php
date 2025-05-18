<?php
require_once("settings.php");
$username = isset($_GET['username']) ? $_GET['username'] : null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Form was submitted, process the update
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "UPDATE users SET email = '$email' WHERE username = 'Amanuial'";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green;'>✅ Email updated successfully</p>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . mysqli_error($conn) . "</p>";
    }
}  // First time loading, show the form


