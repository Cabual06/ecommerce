<?php

    include 'connection.php';

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
<div
    class="w-full h-screen bg-no-repeat bg-cover bg-center bg-[url('./images/herobg.avif')]">
    <div class="w-[90%] mx-auto h-full flex items-center justify-between py-10">
        <div class="lg:w-fit">
            <div
                class="sm:text-6xl xs:text-5xl text-left text-white font-serif font-extrabold uppercase">
                <h1>Shop</h1>
                <h1>now</h1>
                <h1 class="bg-black/30 text-white rounded-sm px-1 shadow-sm shadow-white/50">ANNE'S</h1>
                <h1>FURNITURE</h1>
            </div>
            <div class="w-full flex items-center justify-between mt-6 py-1 px-4 uppercase bg-green-500 rounded-sm">
                <h3 class="text-white text-lg font-semibold">See more</h3>
                <div class="w-[40%] flex items-center text-gray-700 text-4xl gap-0">
                    <hr class="w-full border border-gray-700 relative -right-3" />
                    <ion-icon name="chevron-forward"></ion-icon>
                </div>
            </div>
            <p class="text-md text-white bg-black/30 font-semibold mt-1 capitalize rounded-lg p-2">25% Discount on first Purchase</p>
        </div>

        <div>
            <ul class="text-3xl text-white">
                <li class="flex justify-center items-center p-1 bg-black/40 rounded-full">
                    <ion-icon name="logo-facebook"></ion-icon>
                </li>
                <li class="flex justify-center items-center p-1 bg-black/40 rounded-full mt-2">
                    <ion-icon name="logo-instagram"></ion-icon>
                </li>
                <li class="flex justify-center items-center p-1 bg-black/40 rounded-full mt-2">
                    <ion-icon name="logo-whatsapp"></ion-icon>
                    </ion-icon>
                </li>
                <li class="flex justify-center items-center p-1 bg-black/40 rounded-full mt-2">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </li>
            </ul>
        </div>
    </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>