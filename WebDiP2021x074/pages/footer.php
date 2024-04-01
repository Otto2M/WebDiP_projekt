    <div id="modalDialog" class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div id="formContent" class="mt-3">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Successful!</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Account has been successfully registered!
                    </p>
                </div>
                <div class="items-center px-4 py-3">
                    <button
                            id="ok-btn"
                            class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300"
                    >
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($_COOKIE['use_cookies']) {
        $hideCookiesDialog = true;
    } else {
        $hideCookiesDialog = false;
    }
    ?>
    <div id="cookiesAgreeDialog" class="<?php if($hideCookiesDialog === true) echo 'hidden '; ?>fixed left-0 right-0 bottom-0 z-50">
        <div class="pt-6 pb-4 bg-gray-900">
            <div class="container px-4 mx-auto">
                <h3 class="font-heading text-3xl text-white mb-4">
                    Kolačići na ovoj stranici

                </h3>
                <span class="text-sm text-gray-500 mb-16">
                        Klikom na prihvačanje kolačića slažete se da se informacije za bolji rad sprema u kolačiće na vašem uređaju.
                </span>
                <div class="text-center py-5">
                    <button id="cookiesAgree" class="inline-block w-full sm:w-auto px-7 py-4 mb-4 sm:mb-0 sm:mr-5 text-center font-medium bg-indigo-500 hover:bg-indigo-600 text-white rounded transition duration-250" >
                        Dozvoli kolačiće </button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
  </body>
</html>
