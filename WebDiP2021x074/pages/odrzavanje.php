<?php
require_once (__DIR__ . '/header.php');
?>
<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0 text-red-700">
            <!--img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600"-->
            <span class="object-cover object-center rounded ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-96 w-96" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </span>
        </div>
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Stranica je trenutno u modu održavanja</h1>
            <p class="mb-8 leading-relaxed">Molimo sve posjetioce da budu strpljivi. Nadogradnja ponekad može potrajati nešto duže, pa ako nakon refresha i dalje dobijete ovu poruku, molim dođite za par sati.</p>
        </div>
    </div>
</section>
<?php
require_once (__DIR__ . '/footer.php');
?>
