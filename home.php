<?php 
session_start();
include("php/config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit();
}

$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo"><a href="home.php">Logo</a></div>
        <div class="right-links">
            <a href="edit.php?Id=<?php echo $user['Id']; ?>">Change Profile</a>
            <a href="php/logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <main>
        <div class="main-box">
            <p>Hello <b><?php echo $user['Username']; ?></b>, Welcome!</p>
            <p>Your email is <b><?php echo $user['Email']; ?></b>.</p>
            <p>You are <b><?php echo $user['Age']; ?> years old</b>.</p>
        </div>
    </main>
</body>
</html>
