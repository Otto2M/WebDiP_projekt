<?php
require_once(__DIR__ . '/pages/main.php');

switch ($page) {
    case 'boja':
        require_once('Controllers/BojaController.php');
        $controller = new BojaController($db);
        $controller->parseRequest();
        break;

    case 'kategorija_namjestaja':
        require_once('Controllers/KategorijaNamjestajaController.php');
        $controller = new KategorijaNamjestajaController($db);
        $controller->parseRequest();
        break;

    case 'uloga':
        require_once('Controllers/UlogaController.php');
        $controller = new UlogaController($db);
        $controller->parseRequest();
        break;

    case 'korisnik':
        require_once('Controllers/KorisnikController.php');
        $controller = new KorisnikController($db);
        $controller->parseRequest();
        break;

    case 'narudzba':
        require_once('Controllers/NarudzbaController.php');
        $controller = new NarudzbaController($db);
        $controller->parseRequest();
        break;

    case 'popusti':
        require_once('Controllers/PopustiController.php');
        $controller = new PopustiController($db);
        $controller->parseRequest();
        break;

    case 'tip_radnje':
        require_once('Controllers/TipRadnjeController.php');
        $controller = new TipRadnjeController($db);
        $controller->parseRequest();
        break;

    case 'vrsta_materijala':
        require_once('Controllers/VrstaMaterijalaController.php');
        $controller = new VrstaMaterijalaController($db);
        $controller->parseRequest();
        break;

    case 'uloga_kategorija_namjestaja':
        require_once('COntrollers/Uloga_KategorijaNamjestajaController.php');
        $controller = new Uloga_KategorijaNamjestajaController($db);
        $controller->parseRequest();
        break;

    case 'dnevnik_rada':
        require_once('Controllers/DnevnikRadaController.php');
        $controller = new DnevnikRadaController($db);
        $controller->parseRequest();
        break;

    case 'namjestaj':
        require_once('Controllers/NamjestajController.php');
        $controller = new NamjestajController($db);
        $controller->parseRequest();
        break;

    case 'narudzba_namjestaj':
        require_once('Controllers/Narudzba_NamjestajController.php');
        $controller = new Narudzba_NamjestajController($db);
        $controller->parseRequest();
        break;

    case 'slike':
        require_once('Controllers/SlikeController.php');
        $controller = new SlikeController($db);
        $controller->parseRequest();
        break;

    case 'konfiguracija':
        require_once('Controllers/KonfiguracijaController.php');
        $controller = new KonfiguracijaController($db);
        $controller->parseRequest();
        break;

    case 'prijava':
        require_once('Controllers/LoginController.php');
        $controller = new LoginController($db);
        $controller->login($_POST['korisnicko_ime'], $_POST["lozinka"]);
        break;

    case 'odjava':
        require_once('Controllers/LoginController.php');
        $controller = new LoginController($db);
        $controller->logout();
        break;
    
    case 'loginPage':
        
        if (!isset($_SERVER['HTTPS'])) {
            $https = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            header("Location: " . $https);
        }
        
        require_once('pages/login.php');
        break;

    case 'registracija':
        require_once('Controllers/SignupController.php');
        $controller = new SignupController($db);
        $controller->signup($_POST['name_surname'], $_POST['bdate'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['password_confirmed'], $_POST['cookie']);
        break;

    case 'signupPage':
        require_once('pages/signup.php');
        break;

    case 'home':
        require_once('pages/home.php');
        break;
    
    case 'control':
        require_once('pages/control.php');
        break;

    case 'zaboravljenaLozinka':
        require_once('pages/forgotten_password.php');
        break;

    case 'forgottenPassword':
        require_once('Controllers/ForgottenPasswordController.php');
        $controller = new ForgottenPasswordController($db);
        $controller->sentNewPassword($_POST['email']);
        break;

    case 'cookies':
        require_once('pages/cookies.php');
        break;

    case 'oAutoru':
        require_once('pages/oAutoru.php');
        break;
    
    case 'dokumentacija':
        require_once('pages/dokumentacija.php');
        break;

    default:
        header("Location: ./?page=home");

}
