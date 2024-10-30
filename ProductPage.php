<?php

    include 'connection.php';

    // Define the number of results per page
    $results_per_page = 12;

    // Determine the current page number
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

    // Calculate the starting limit for the results on the displaying page
    $start_limit = ($page - 1) * $results_per_page;

    // Exclude product ID 13 on page 1
    $product_filter = ($page == 1) ? "WHERE id != 13" : "";

    // Query to get the total number of products for pagination
    $total_results_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM `products` $product_filter");
    $total_results = mysqli_fetch_assoc($total_results_query)['total'];
    $total_pages = ceil($total_results / $results_per_page);

    // Query to get products for the current page
    $select_products = mysqli_query($conn, "SELECT * FROM `products` $product_filter LIMIT $start_limit, $results_per_page") or die('Query failed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
</head> 

<?php
    include 'header.php';
?>

<body>

<section class="py-12 bg-white sm:py-16 lg:py-20 lg:mt-12">
    <nav class="bg-gray-900 p-4 mb-6">
      <div
        class="container max-w-6xl mx-auto flex flex-col sm:flex-row gap-8 items-center"
      >
        <!-- Search area -->
        <div class="relative w-full flex items-center gap-4">
            <svg
                class="text-gray-400"
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
            </svg>
            <input
                type="text"
                id="search"
                class="bg-gray-700 rounded-lg p-2 pl-10 transition focus:w-full border-2 border-black"
                placeholder="Search products..."
            />
        </div>

        <!-- Cart icon -->
        <span class="relative text-center">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            #
            height="24"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z"
            />
            <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
          </svg>
          <small
            id="cart-count"
            class="bg-red-500 text-xs text-white w-4 h-4 absolute -top-2 -right-2 rounded-full"
            >0</small
          >
        </span>
      </div>
      
    </nav>

    <!-- <div class="container mx-auto max-w-6xl mb-4">
        <button onclick="toggleFilters()" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Show Filters</button>
    </div> -->

<main class="flex flex-col md:flex-row container mx-auto max-w-6xl">

<div class="container mx-auto max-w-6xl mb-4 relative">

        <button onclick="toggleDropdown()" class="px-4 py-2 bg-blue-500 text-white rounded-lg">
            Show Filters
        </button>

        <div id="dropdown-filters" class="hidden absolute bg-white shadow-lg rounded-lg p-4 mt-2 w-58 z-10">
            <h3 class="text-xl mb-2">Categories</h3>
            <br>
            <div class="space-y-2">
                <div>
                    <input type="checkbox" class="check" id="sofa" />
                    <label for="sofa">Sofa</label>
                </div>
                <div>
                    <input type="checkbox" class="check" id="bed" />
                    <label for="bed">Bed</label>
                </div>
                <div>
                    <input type="checkbox" class="check" id="couch" />
                    <label for="couch">Couch</label>
                </div>
                <div>
                    <input type="checkbox" class="check" id="chair" />
                    <label for="chair">Chair</label>
                </div>
            </div>
        </div>
    </div>


  <!-- Products wrapper -->
  <div
    id="products-wrapper"
    class="w-full max-w-4xl mx-auto grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-6 place-content-center p-4"
  ></div>
  
</main>

<div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
    <div class="grid grid-cols-2 gap-12 mt-10 lg:mt-16 lg:gap-12 lg:grid-cols-4">
        <?php
        if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                ?>
                <form method="POST">
                    <div class="relative group">
                        <div class="overflow-hidden aspect-w-1 aspect-h-1">
                            <img class="object-cover w-full h-full transition-all duration-300 group-hover:scale-110" src="./images/<?php echo $fetch_product['image']; ?>">
                            <input type="hidden" name="product_id" value="<?php echo $fetch_product['id']; ?>">
                        </div>
                        <div class="absolute left-3 top-3">
                            <p class="sm:px-3 sm:py-1.5 px-1.5 py-1 text-[8px] sm:text-xs font-bold tracking-wide text-gray-900 uppercase bg-white rounded-full">New</p>
                        </div>
                        <div class="flex items-start justify-between mt-4 space-x-4">
                            <div>
                                <h3 class="text-xs font-bold text-gray-900 sm:text-sm md:text-base">
                                    <a href="#" title=""><?php echo $fetch_product['name']; ?>
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                    </a>
                                </h3>
                            </div>
                            <div class="text-right">
                                <p class="text-xs font-bold text-gray-900 sm:text-sm md:text-base">Php: <?php echo $fetch_product['price']; ?></p>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
            }
        } else {
            echo '<p>No Products Found</p>';
        }
        ?>
    </div>
    <br><br>
    <div class="pagination flex justify-center mt-4">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>" class="px-4 py-2 bg-gray-300 rounded">Previous</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" class="px-4 py-2 bg-<?php echo ($i == $page) ? 'blue-500 text-white' : 'gray-300'; ?> rounded"><?php echo $i; ?></a>
        <?php endfor; ?>
        <?php if ($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>" class="px-4 py-2 bg-gray-300 rounded">Next</a>
        <?php endif; ?>
    </div>
</div>

<script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown-filters');
            dropdown.classList.toggle('hidden');
        }
    </script>

</section>

</body>
</html>