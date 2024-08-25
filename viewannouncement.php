<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "noticeboard";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = $_POST['user-email'];

    // Prepare an SQL statement
    $stmt = $conn->prepare("SELECT title, date, category, description, poster_name FROM announcements WHERE poster_email = ?");
    $stmt->bind_param("s", $email);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there are announcements
    if ($result->num_rows > 0) {
        echo "<h2>Announcements for $email</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
            echo "<p><strong>Date:</strong> " . htmlspecialchars($row['date']) . "</p>";
            echo "<p><strong>Category:</strong> " . htmlspecialchars($row['category']) . "</p>";
            echo "<p><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>";
            echo "<p><strong>Posted by:</strong> " . htmlspecialchars($row['poster_name']) . "</p>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No announcements found for this email address.</p>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
