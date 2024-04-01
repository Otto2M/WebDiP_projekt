<!-- Navbar goes here -->
<nav class="bg-white shadow-lg">
    <div class="mx-auto max-w-6xl px-4">
        <div class="flex justify-between">
            <div class="flex space-x-7">
                <div>
                    <!-- Website Logo -->
                    <a href="#" class="flex items-center py-4 px-2">
                        <!--img src="https://www.thoughtspacedesigns.com/wp-content/uploads/2013/07/oktolab.png" alt="Logo" class="mr-2 h-8 w-8" /-->
                        <span class="text-lg font-semibold text-gray-500">Namještaj</span>
                    </a>
                </div>
                <!-- Primary Navbar items -->
                <div class="hidden items-center space-x-1 md:flex">
                    <a href="#1" class="border-b-4 border-green-500 py-4 px-2 font-semibold text-green-500"> <?php echo $_GET['page'] ?></a>
                    <a href="./?page=oAutoru" class="py-4 px-2 font-semibold text-gray-500 transition duration-300 hover:text-green-500">O autoru</a>
                    <a href="./?page=dokumentacija" class="py-4 px-2 font-semibold text-gray-500 transition duration-300 hover:text-green-500">Dokumentacija</a>
                </div>
            </div>
            <!-- Secondary Navbar items -->
            <?php
            if (isset($_SESSION['id'])) {
            ?>
                <div class="hidden items-center space-x-3 md:flex">
                    <a href="?page=odjava" class="rounded bg-green-500 py-2 px-2 font-medium text-white transition duration-300 hover:bg-green-400">Odjava</a>
                </div>
            <?php
            } else {
            ?>
                <div class="hidden items-center space-x-3 md:flex">
                <a href="?page=loginPage" class="rounded py-2 px-2 font-medium text-gray-500 transition duration-300 hover:bg-green-500 hover:text-white">Prijavi se</a>
                <a href="?page=signupPage" class="rounded bg-green-500 py-2 px-2 font-medium text-white transition duration-300 hover:bg-green-400">Registriraj se</a>
                </div>
                <?php
            }
            ?>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button class="mobile-menu-button outline-none" aria-label="mobile menu">
                    <svg class="h-6 w-6 text-gray-500 hover:text-green-500" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- mobile menu -->
    <div class="mobile-menu hidden">
        <ul class="">
            <li class="active"><a href="#3index.html" class="block bg-green-500 px-2 py-4 text-sm font-semibold text-white">Home</a></li>
            <li><a href="#3services" class="block px-2 py-4 text-sm transition duration-300 hover:bg-green-500">Services</a></li>
            <li><a href="#3about" class="block px-2 py-4 text-sm transition duration-300 hover:bg-green-500">O autoru</a></li>
            <li><a href="#3contact" class="block px-2 py-4 text-sm transition duration-300 hover:bg-green-500">Dokumentacija</a></li>
        </ul>
    </div>
    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
</nav>
