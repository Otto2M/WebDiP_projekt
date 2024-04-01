<div id="container">
    <?php 
    if(isset($_SESSION['uloga_id']) && $_SESSION['uloga_id'] < 3 ) {
        require_once('pages/menu_left.php'); 
    }

    ?>
    <div class="w-auto">
    <?php require_once('pages/menu_top.php');  ?>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="" overflow-hidden>
                        <div class="">
                            <div id='showData' class="h-screen p-5 shadow-lg rounded-md bg-white"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
