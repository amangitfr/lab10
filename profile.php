<?php
require_once("settings.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Lookup</title>
</head>
<body>

<form action="profile.php" method="GET">
    Username: <input type="text" name="username" required>
    Password: <input type="password" name="password" required>
    <input type="submit" value="Search">
</form>

<?php
if (isset($_GET['username']) && isset($_GET['password'])) {
    $username = mysqli_real_escape_string($conn, $_GET['username']);
    $passwd = mysqli_real_escape_string($conn, $_GET['password']);

    $sql = "SELECT * FROM users WHERE username LIKE '%$username%' AND password LIKE '%$passwd%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h3>Matching Users:</h3>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Username</th><th>Password</th><th>Email</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['password']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Add update button to go to update_profile.php
        echo '<form action="update_profile.php" method="POST">';
        echo '<input type="email" name="email" placeholder="Update Email">';
        echo '<input type="submit" value="Update Email">';
        echo '</form>';
    } else {
        echo "<p>🚫 No matching Users found.</p>";
    }
}

mysqli_close($conn);
?>

</body>
</html>
