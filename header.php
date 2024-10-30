<?php

   // Start the session to check for login status
   session_start();

  include 'connection.php';

  // Check if the user is logged in by looking for a session variable (e.g., 'user_id')
  $is_logged_in = isset($_SESSION['user_id']);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="output.css" rel="stylesheet">
    
    
    <style>
      #mobile-menu {
        display: none;
      }
    </style>

</head>
<body>
    
<div class="">
  <header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Anne's Furniture</span>
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
        </a>
      </div>
      <div class="flex lg:hidden">
        <button type="button" id="open-menu" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
        <a href="Homepage.php" class="text-lg font-semibold leading-6 text-black">Home</a>
        <a href="ProductPage.php" class="text-lg font-semibold leading-6 text-black">Productsss</a>
        <a href="items.php" class="text-lg font-semibold leading-6 text-black">Story</a>
        <a href="about.php" class="text-lg font-semibold leading-6 text-black">About-us</a>
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <!-- Conditionally render the login or logout button based on session -->
        <?php if ($is_logged_in): ?>
          <a href="logout.php" class="text-lg font-semibold leading-6 text-gray-900">Logout <span aria-hidden="true">&rarr;</span></a>

        <?php else: ?>
          <a href="login.php" class="text-lg font-semibold leading-6 text-gray-900">Log in</a>
        <?php endif; ?>
      </div>
    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden" id="mobile-menu" role="dialog" aria-modal="true">
      <!-- Background backdrop, show/hide based on slide-over state. -->
      <div class="fixed inset-0 z-50"></div>
      <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Anne's Furniture</span>
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
          </a>
          <button type="button" id="close-menu" class="-m-2.5 rounded-md p-2.5 text-gray-700">
            <span class="sr-only" id="close-menu">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
              <a href="Homepage.php" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Home</a>
              <a href="ProductPage.php" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Productsss</a>
              <a href="items.php" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Story</a>
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">About-us</a>
            </div>
            <div class="py-6">
              <!-- Conditionally render the login or logout button for mobile -->
              <?php if ($is_logged_in): ?>
                <a href="logout.php" class="text-sm font-semibold leading-6 text-gray-900">Logout <span aria-hidden="true">&rarr;</span></a>
              <?php else: ?>
                <a href="signin.php" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>

<script>
  const openMenuButton = document.getElementById('open-menu');
  const closeMenuButton = document.getElementById('close-menu');
  const mobileMenu = document.getElementById('mobile-menu');

  openMenuButton.addEventListener('click', function() {
    mobileMenu.style.display = 'block'; // Show the menu
  });

  closeMenuButton.addEventListener('click', function() {
    mobileMenu.style.display = 'none'; // Hide the menu
  });
</script>

</body>
</html>
