<?php
$korisnicko_ime = $_COOKIE['korisnicko_ime'] ?? '';
?>
<div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
    <form action="restAPI.php?page=prijava" id="" method="post">
        <div>
            <h2>Prijava</h2>
        <div>
        <div>
            <label for="korime" class="block text-sm font-medium text-gray-700"><b>Korisničko ime</b></label>
            <input type="text" placeholder="Unesite korisničko ime" value="<?php echo $korisnicko_ime; ?>" name="korisnicko_ime" id="korisnicko_ime" maxlength="25" size="25" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
            </div>
        <div>
            <label for="lozinka" class="block text-sm font-medium text-gray-700"><b>Lozinka</b></label>
            <input type="password" placeholder="Unesite lozinku" name="lozinka" id="lozinka" maxlength="50" size="50" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
        </div>
        <div>
            <a href="./?page=zaboravljenaLozinka">Zaboravljena lozinka?</a>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <input type="submit" value="Prijava" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        </div>
    </form>
</div>
