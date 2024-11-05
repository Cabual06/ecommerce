<?php

    include 'connection.php';
    session_start();

    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'") or die('Query failed!');

    if(mysqli_num_rows($select_user) > 0){
      $row = mysqli_fetch_assoc($select_user);

      if($email == "admin@gmail.com" && $password == "admin"){
        header("location: dashboard.php"); 
      } else {
        header("location: Homepage.php"); 
      }
    } else {
      echo "User does not exist!";
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
</head>
<body>
    <!-- component -->
<div class="bg-gray-100 flex justify-center items-center h-screen">
    <!-- Left: Image -->
<div class="w-1/2 h-screen hidden lg:block">
  <img src="./images/bg2.jpeg" alt="Placeholder Image" class="object-cover w-full h-full">
</div>
<!-- Right: Login Form -->
<div class="lg:p-46 md:p-52 sm:20 p-8 w-full lg:w-1/2">

  <h1 class="text-4xl font-semibold mb-8">Login</h1>

  <form action="#" method="POST">
    <!-- Username Input -->
    <div class="mb-4">
      <label for="username" class="block text-gray-600">Email</label>
      <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
    </div>
    <!-- Password Input -->
    <div class="mb-4">
      <label for="password" class="block text-gray-600">Password</label>
      <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
    </div>
    <!-- Remember Me Checkbox -->
    <div class="mb-4 flex items-center">
      <input type="checkbox" id="remember" name="remember" class="text-blue-500">
      <label for="remember" class="text-gray-600 ml-2">Remember Me</label>
    </div>
    <!-- Forgot Password Link -->
    <!-- <div class="mb-6 text-blue-500">
      <a href="#" class="hover:underline">Forgot Password?</a>
    </div> -->
    <!-- Login Button -->
    <button type="submit" name="login" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Login</button>
  </form>
  <!-- Sign up  Link -->
  <div class="mt-6 text-blue-500 text-center">
    <a href="register.php" class="hover:underline">Sign up Here</a>
  </div>
</div>
</div>
</body>
</html>