<?php
session_start();
include("php/config.php");

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $age = (int) $_POST['age']; // Cast to integer

    // Check if email already exists
    $query = "SELECT * FROM users WHERE Email='$email'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($con)); // Debug the query
    }

    if (mysqli_num_rows($result) > 0) {
        echo "Email is already registered!";
    } else {
        // Insert the new user
        $query = "INSERT INTO users (Username, Email, Password, Age) VALUES ('$username', '$email', '$password', $age)";
        $insert_result = mysqli_query($con, $query);

        if ($insert_result) {
            echo "Registration successful!";
            header("Location: index.php");
        } else {
            die("Registration Failed: " . mysqli_error($con));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Register</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register">
                </div>
                <div class="links">
                    Already have an account? <a href="index.php">Login Now</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
