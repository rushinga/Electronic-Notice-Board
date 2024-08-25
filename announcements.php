<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = ""; // Default password for MySQL root user
$dbname = "noticeboard";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$title = $_POST['title'] ?? null;
$date = $_POST['date'] ?? null;
$category = $_POST['category'] ?? null;
$description = $_POST['description'] ?? null;
$poster_name = $_POST['poster-name'] ?? null;
$poster_email = $_POST['poster-email'] ?? null;

// Ensure all fields are filled
if ($title && $date && $category && $description && $poster_name && $poster_email) {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO announcements (title, date, category, description, poster_name, poster_email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $date, $category, $description, $poster_name, $poster_email);

    if ($stmt->execute()) {
        // Display success message and redirect
        echo "<div style='text-align: center; margin-top: 50px;'>
                <h2>Announcement Created Successfully</h2>
                <p>Your announcement will be posted after 24 hours.</p>
                <p>You will be redirected back to the form shortly...</p>
              </div>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'announcements.html'; // Change this to your form page URL
                }, 5000); // Redirect after 5 seconds
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Please fill in all fields.";
}

$conn->close();
?>
