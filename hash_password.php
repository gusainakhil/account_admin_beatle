<?php
// hash_password.php - Utility to generate password hashes
// Usage: php hash_password.php password123

if ($argc < 2) {
    echo "Usage: php hash_password.php <password>\n";
    exit(1);
}

$password = $argv[1];
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Password: $password\n";
echo "Hash: $hash\n";
echo "\nSQL Insert Example:\n";
echo "INSERT INTO users (username, password_hash, email, role) VALUES ('username', '$hash', 'email@example.com', 'admin');\n";
?>
