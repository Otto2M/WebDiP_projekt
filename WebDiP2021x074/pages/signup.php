<div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
    <form action="restAPI.php?page=registracija" id="registracija" method="post">
        <?php
            if(! empty($_SESSION['msg'])) {
                echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">';
                echo '<strong class="font-bold">Greške su:</strong><br>';
                echo '<span class="block sm:inline">' . nl2br(htmlspecialchars($_SESSION['msg'])) . '</span>';
                echo '</div>';
            }
            $name_surname = isset($_SESSION['name_surname']) ? htmlspecialchars($_SESSION['name_surname']) : "";
            $bdate = isset($_SESSION['bdate']) ? htmlspecialchars($_SESSION['bdate']) : "";
            $email = isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : "";
            $username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : "";
            $cookie = isset($_SESSION['cookie']) ? "checked" : "";
        ?>
        <div>
            <label for="name_surname" class="block text-sm font-medium text-gray-700">Ime i prezime</label>
            <input type="text" placeholder="Unesite vaše ime i prezime" name="name_surname" id="name_surname" autofocus required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500" value="<?php echo $name_surname; ?>">
        </div>
        <div>
            <label for="bdate" class="block text-sm font-medium text-gray-700">Godina rođenja</label>
            <input type="date" name="bdate" id="bdate" required onChange="checkAge(this)" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500" value="<?php echo $bdate; ?>">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email adresa</label>
            <input type="email" placeholder="ldap@foi.hr" name="email" id="email" onChange="checkEmail(this)" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500" value="<?php echo $email; ?>">
        </div>
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Korisničko ime</label>
            <input type="text" placeholder="Unesite korisničko ime" name="username" id="username" onChange="checkName(this)" maxlength="25" size="25" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500" value="<?php echo $username; ?>">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Lozinka</label>
            <input type="password" placeholder="Unesite lozinku" name="password" id="password" maxlength="50" size="50" onChange="checkPassword(this)" required1 class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
        </div>
        <div>
            <label for="password_confirmed" class="block text-sm font-medium text-gray-700">Potvrda lozinke</label>
            <input type="password" placeholder="Potvrdite lozinku" name="password_confirmed" id="password_confirmed" onChange="checkConfirmedPassword(this)" maxlength="50" size="50" required1 class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Dozvole za korištenje kolačića</label><br>
            <input type="checkbox" name="cookie" id="cookie" onChange="checkCookies(this)" <?php echo $cookie; ?>> Dopusti korištenje kolačića
        </div>
        <div>

        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <br><input class="g-recaptcha" data-sitekey="6Lf0RGkgAAAAAL3T5EtJ-LocYGOdj7nae4__ZxhC" data-callback='onSubmit' 
            data-action='submit' value="Registracija" type="submit" id="button" name="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        </div>
    </form>
</div>
