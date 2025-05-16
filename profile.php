<?php
require_once("settings.php");


<form action="update_profile.php" method="GET">
    if (isset($_GET['username']) && isset($_GET['password'])) {
        $username = mysqli_real_escape_string($conn, $_GET['username']);
        $passwd = mysqli_real_escape_string($conn, $_GET['password']);

        $sql = "SELECT * FROM users WHERE username LIKE '%$username%'" . 
            " AND password LIKE '%$passwd%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>Username</th><th>Password</th><th>Email</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            <input type="Button" value="Update">
        } else {
            echo "🚫 No matching Users found.";
        }
    } else {
        echo "Please enter correct details to go through.";
    }
</form>
mysqli_close($conn);
?>
