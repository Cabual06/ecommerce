<?php
include 'connection.php';
session_start();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if user exists
    $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'") or die('Query failed!');

    if(mysqli_num_rows($select_user) > 0){
        $row = mysqli_fetch_assoc($select_user);

        if ($email == "admin@gmail.com" && $password == "admin") {
            $_SESSION['success_message'] = "Welcome, admin!";
            header("location: dashboard.php");
            exit;
        } elseif ($row['password'] == $password) {
            $_SESSION['success_message'] = "Login successful!";
            header("location: Homepage.php");
            exit;
        } else {
            $_SESSION['error_message'] = "Incorrect password!";
        }
    } else {
        $_SESSION['error_message'] = "User does not exist!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
    <style>
        /* Optional styles for the alerts */
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-weight: bold;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
<div class="bg-gray-100 flex justify-center items-center h-screen">
    <!-- Left: Image -->
    <div class="w-1/2 h-screen hidden lg:block">
        <img src="./images/bg2.jpeg" alt="Placeholder Image" class="object-cover w-full h-full">
    </div>
    <!-- Right: Login Form -->
    <div class="lg:p-46 md:p-52 sm:20 p-8 w-full lg:w-1/2">
        <h1 class="text-4xl font-semibold mb-8">Login</h1>

        <!-- Display Success or Error Message -->
        <?php if(isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success_message'];
                    unset($_SESSION['success_message']); // Clear message after display
                ?>
            </div>
        <?php elseif(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-error">
                <?php 
                    echo $_SESSION['error_message'];
                    unset($_SESSION['error_message']); // Clear message after display
                ?>
            </div>
        <?php endif; ?>

        <form action="#" method="POST">
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-gray-600">Email</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
            </div>
            <!-- Password Input -->
            <div class="mb-4">
                <label for="password" class="block text-gray-600">Password</label>
                <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
            </div>
            <!-- Login Button -->
            <button type="submit" name="login" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Login</button>
        </form>

        <!-- Sign up Link -->
        <div class="mt-6 text-blue-500 text-center">
            <a href="register.php" class="hover:underline">Sign up Here</a>
        </div>
    </div>
</div>
</body>
</html>
