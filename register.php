<?php
// Simple registration handler (for example only)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if (!$username || !$password) {
        echo "Please fill in all fields.";
        exit;
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // In a real application, you would save $username and $hashed_password to a database.
    // For demonstration, we'll just echo success.
    // Example of how you might verify a password later:
    // if (password_verify($password, $hashed_password)) {
    //     echo "Password is valid!";
    // } else {
    //     echo "Invalid password.";
    // }

    echo "Registration successful for user: " . htmlspecialchars($username); // Sanitize output
} else {
    echo "Invalid request method.";
}
