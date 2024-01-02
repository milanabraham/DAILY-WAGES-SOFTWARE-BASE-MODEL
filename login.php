<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Login</h2>
    <form action="process_login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter Mail ID" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label>Login as:</label>
        <input type="radio" id="admin" name="role" value="admin" required>
        <label for="admin">Admin</label>
        
        <input type="radio" id="user" name="role" value="user" required>
        <label for="user">User</label><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>

