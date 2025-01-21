<?php
session_start();
include 'static_values.php';

if (isset($_SESSION['username']) || isset($_COOKIE['username'])) {
    header("Location: home.php");
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    if ($username === USERNAME && $password === PASSWORD) {
        $_SESSION['username'] = $username;

        if ($remember) {
            setcookie('username', $username, time() + (86400 * 30), "/"); 
        }

        header("Location: home.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link  rel="stylesheet" href="login.css">
</head>
<body id="background">
    <div class="mgm">
        <h1>Mahatma Gandhi Mission</h1>
        <h3>Strength does not come from winning.When you go through hardships and decide not to surrender. That is strength. <br>
        - Mahatma Gandhi</h3>
        <h3>Welcome to MGM University and the inspirations of the Mahatma,everyday, to move forward with resolve.</h3>
    </div>

    <div id=login-block>
      <h2 class="tital">Login</h2>
      <h4>Welcome to LogIn Page...!!</h4>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
   
      <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label><input type="checkbox" name="remember"> Remember Me</label><br>

        <h4><p>If you dont have account please <a href="" >Register Here..!!</a></p></h4> 
        <button type="submit">Login</button>
      </form>
    </div>
</body>
</html>
