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
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO contactus (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Display success message and redirect
        echo "<div style='text-align: center; margin-top: 50px;'>
                <h2>Message sent successfully</h2>
                <p>Your message is important and we highly value it .</p>
                <p>You will be redirected back to the form shortly...</p>
              </div>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'contact.html'; // Change this to your form page URL
                }, 5000); // Redirect after 5 seconds
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
