<div class="flex">
    <div id="sidebar" class="relative h-screen w-20 bg-indigo-900 p-5 pt-8 duration-300">
        <!-- w72 open i w20 close -->
        <div id="menu-toggle" onClick="setOpen();" class="absolute -right-3 top-9 cursor-pointer rounded-full border border-indigo-900 bg-white text-3xl text-indigo-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
            </svg>
        </div>
        <div class="flex">
            <div id="logoIcon" class="float-left mr-2 block rotate-[360] cursor-pointer rounded bg-yellow-300 text-4xl transition duration-500 ease-in-out">
                <!-- open rotate-[360] -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
            </div>
            <h1 id="logoTitle" class="scale-0 text-1xl origin-left font-medium text-white duration-500">
            <?php 
            if(isset($_SESSION['uloga_id']) && $_SESSION['uloga_id'] == 1) echo "Admin";
            else echo "Moderator";
            ?>
            </h1>
            <!-- !open scale-0-->
        </div>
        <ul id="pages" class="pt-2">
            <li key="boja" class="menu-link mt-2 flex cursor-pointer items-center gap-x-4 rounded-md p-2 text-sm text-gray-300 hover:bg-indigo-400">
                <a href="?page=boja" title="Boja" class="flex">
                    <span class="float-left block h-6 w-6 cursor-pointer text-2xl text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                    </span>
                    <span class="naziv px-3  hidden duration-100 scale-0 flex-1 text-base font-medium">Boje</span>
                </a>
            </li>

            <li key="vrsta_materijala" class="menu-link mt-2 flex cursor-pointer items-center gap-x-4 rounded-md p-2 text-sm text-gray-300 hover:bg-indigo-400">
                <a href="?page=vrsta_materijala" title="Vrsta Materijal" class="flex">
                    <span class="float-left block h-6 w-6 cursor-pointer text-2xl text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </span>
                    <span class="naziv px-3  hidden duration-100 scale-0 flex-1 text-base font-medium">Materijal</span>
                </a>
            </li>

            <?php

            ?>
            <li key="Kat. namjestaja" class="menu-link mt-2 flex cursor-pointer items-center gap-x-4 rounded-md p-2 text-sm text-gray-300 hover:bg-indigo-400">
                <a href="?page=kategorija_namjestaja" title="Kategorije namjestaja" class="flex">
                    <span class="float-left block h-6 w-6 cursor-pointer text-2xl text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                        </svg>
                    </span>
                    <span class="naziv px-3  hidden duration-100 scale-0 flex-1 text-base font-medium">Kategorija</span>
                </a>
            </li>
            <?php
            
            ?>

            <li key="Namjestaj" class="menu-link mt-2 flex cursor-pointer items-center gap-x-4 rounded-md p-2 text-sm text-gray-300 hover:bg-indigo-400">
                <a href="?page=namjestaj" title="Namještaj" class="flex">
                    <span class="float-left block h-5 w-5 cursor-pointer text-2xl text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </span>
                    <span class="naziv px-3  hidden duration-100 scale-0 flex-1 text-base font-medium">Namještaj</span>
                </a>
            </li>

            <li key="Narudžba" class="menu-link mt-2 flex cursor-pointer items-center gap-x-4 rounded-md p-2 text-sm text-gray-300 hover:bg-indigo-400">
                <a href="?page=narudzba" title="Narudžba" class="flex">
                    <span class="float-left block h-5 w-5 cursor-pointer text-2xl text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </span>
                    <span class="naziv px-3  hidden duration-100 scale-0 flex-1 text-base font-medium">Narudžba</span>
                </a>
            </li>


            <?php
            if(isset($_SESSION['uloga_id']) && $_SESSION['uloga_id'] < 2 ) {
            ?>
            <li key="Popusti" class="menu-link mt-2 flex cursor-pointer items-center gap-x-4 rounded-md p-2 text-sm text-gray-300 hover:bg-indigo-400">
                <a href="?page=popusti" title="Popusti" class="flex">
                    <span class="float-left block h-5 w-5 cursor-pointer text-2xl text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                      </svg>
                    </span>
                    <span class="naziv px-3  hidden duration-100 scale-0 flex-1 text-base font-medium">Popusti</span>
                </a>
            </li>
            <?php
            }
            ?>
           

            <li key="Slike" class="menu-link mt-2 flex cursor-pointer items-center gap-x-4 rounded-md p-2 text-sm text-gray-300 hover:bg-indigo-400">
                <a href="?page=slike" title="Slike" class="flex">
                    <span class="float-left block h-5 w-5 cursor-pointer text-2xl text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </span>
                    <span class="naziv px-3  hidden duration-100 scale-0 flex-1 text-base font-medium">Slike</span>
                </a>
            </li>

            <?php
            if(isset($_SESSION['uloga_id']) && $_SESSION['uloga_id'] < 2 ) {
            ?>
            <li key="Uloge" class="menu-link mt-9 flex cursor-pointer items-center gap-x-4 rounded-md p-2 text-sm text-gray-300 hover:bg-indigo-400">
                <a href="?page=uloga" title="Uloga" class="flex">
                    <span class="float-left block h-5 w-5 cursor-pointer text-2xl text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </span>
                    <span class="naziv px-3  hidden duration-100 scale-0 flex-1 text-base font-medium">Uloge</span>
                </a>
            </li>

            <li key="Korisnici" class="menu-link mt-2 flex cursor-pointer items-center gap-x-4 rounded-md p-2 text-sm text-gray-300 hover:bg-indigo-400">
                <a href="?page=korisnik" title="Korisnici" class="flex">
                    <span class="float-left block h-5 w-5 cursor-pointer text-2xl text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                    <span class="naziv px-3  hidden duration-100 scale-0 flex-1 text-base font-medium">Korisnici</span>
                </a>
            </li>

            <li key="Tip radnje" class="menu-link mt-2 flex cursor-pointer items-center gap-x-4 rounded-md p-2 text-sm text-gray-300 hover:bg-indigo-400">
                <a href="?page=tip_radnje" title="Tip radnje" class="flex">
                    <span class="float-left block h-5 w-5 cursor-pointer text-2xl text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                    <span class="naziv px-3  hidden duration-100 scale-0 flex-1 text-base font-medium">Tip radnje</span>
                </a>
            </li>

            <li key="dnevnik_rada" class="mt-2 flex cursor-pointer items-center gap-x-4 rounded-md p-2 text-sm text-gray-300 hover:bg-indigo-400">
                <a href="?page=dnevnik_rada" title="Dnevnik Rada" class="flex">
                    <span class="float-left block h-6 w-6 cursor-pointer text-2xl text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                        </svg>
                    </span>
                    <span class="naziv px-3  hidden duration-100 scale-0 flex-1 text-base font-medium">Dnevnik</span>
                </a>
            </li>

            <li key="konfiguracija" class="mt-2 flex cursor-pointer items-center gap-x-4 rounded-md p-2 text-sm text-gray-300 hover:bg-indigo-400">
                <a href="?page=konfiguracija&action=edit&id=1" title="Konfiguracija" class="flex">
                <span class="float-left block h-6 w-6 cursor-pointer text-2xl text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </span>
                    <span class="naziv px-3  hidden duration-100 scale-0 flex-1 text-base font-medium">Konfiguracija</span>
                </a>
            </li>



            <?php
            }
            ?>
            


        </ul>
    </div>
<script>

</script>
