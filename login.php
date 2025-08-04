<?php
session_start();
require_once 'db.php';

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    if (!empty($username) && !empty($password)) {
        // Check user credentials
        $stmt = $conn->prepare("SELECT id, username, password_hash, email, role FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($user = $result->fetch_assoc()) {
            // Verify password
            if (password_verify($password, $user['password_hash'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['email'] = $user['email'];
                
                header('Location: index.php');
                exit;
            } else {
                $error_message = 'Invalid username or password.';
            }
        } else {
            $error_message = 'Invalid username or password.';
        }
        $stmt->close();
    } else {
        $error_message = 'Please enter both username and password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beatle Analytics - Admin Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e3f0ff 0%, #f9f9f9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            width: 100%;
            max-width: 370px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(30, 64, 175, 0.10);
            padding: 2.7rem 2.2rem 2.2rem 2.2rem;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        .login-header {
            text-align: center;
        }
        .login-header i {
            font-size: 2.8rem;
            color: #2563eb;
            margin-bottom: 0.5rem;
        }
        .login-header h2 {
            margin: 0.5rem 0 0 0;
            font-weight: 700;
            color: #22223b;
            font-size: 1.7rem;
            letter-spacing: 0.5px;
        }
        .login-form .form-group {
            margin-bottom: 1.1rem;
        }
        .login-form label {
            font-weight: 500;
            color: #3a3a3a;
            margin-bottom: 0.35rem;
            display: block;
            font-size: 1rem;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1.5px solid #e0e7ef;
            border-radius: 8px;
            font-size: 1.05rem;
            background: #f7fafc;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .login-form input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px #e0e7ef;
            background: #fff;
        }
        .login-form .form-actions {
            margin-top: 1.2rem;
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
        }
        .login-form button {
            background: linear-gradient(90deg, #2563eb 0%, #1e40af 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.9rem;
            font-size: 1.13rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(37,99,235,0.08);
            transition: background 0.2s, transform 0.1s;
        }
        .login-form button:hover {
            background: linear-gradient(90deg, #1e40af 0%, #2563eb 100%);
            transform: translateY(-2px) scale(1.01);
        }
        .login-form .login-error {
            color: #d93025;
            font-size: 1rem;
            margin-bottom: 0.7rem;
            display: none;
            text-align: center;
        }
        @media (max-width: 480px) {
            .login-container {
                padding: 1.5rem 0.7rem;
            }
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <i class="fas fa-railway"></i>
            <h2>Admin Login</h2>
        </div>
        <form class="login-form" method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required autofocus value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <?php if ($error_message): ?>
            <div class="login-error" style="display: block;"><?php echo htmlspecialchars($error_message); ?></div>
            <?php endif; ?>
            <div class="form-actions">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
