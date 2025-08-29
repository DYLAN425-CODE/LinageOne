<?php
// Simple PHP script to save account data to accounts.txt
// Accepts POST: username, gender, password

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if ($username === '' || $password === '' || $gender === '') {
        http_response_code(400);
        echo 'Missing required fields.';
        exit;
    }

    // Save as CSV line: username,gender,password,date
    $line = $username . ',' . $gender . ',' . $password . ',' . date('Y-m-d H:i:s') . "\n";
    $file = fopen('accounts.txt', 'a');
    fwrite($file, $line);
    fclose($file);

    echo 'Account saved!';
} else {
    http_response_code(405);
    echo 'Method not allowed.';
}
?>
