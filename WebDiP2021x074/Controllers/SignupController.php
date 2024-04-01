<?php
define("RECAPTCHA_V3_SECRET_KEY", '6Lf0RGkgAAAAAMcLFnrDcfPC83FemRPFqFh0iVul ');

class SignupController {

    private $name_surname = null;
    private $bdate = null;
    private $email = null;
    private $username = null;
    private $password = null;
    private $password_confirmed = null;
    private $password_256 = null;

    public function __construct($db) {
        $this->db = $db;
        $this->action = $_GET['action'] ?? '';
    }


    public function signup($name_surname, $bdate, $email, $username, $password, $password_confirmed, $cookie) {
        
        // call curl to POST request
        /*
        $post_data = http_build_query(
            array(
                'secret' => RECAPTCHA_V3_SECRET_KEY,
                'response' => $_POST['g-recaptcha-response'],
                'remoteip' => $_SERVER['REMOTE_ADDR']
            )
        );
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $post_data
            )
        );
        $context  = stream_context_create($opts);
        $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
        $arrResponse = json_decode($response, true);
        if (!$arrResponse->success) {
            throw new Exception('Gah! CAPTCHA verification failed.', 1);
        }
        */

        $msg = "";
        if(strlen($name_surname) < 5) {
            $msg .= 'Ime i prezime je prekratko! Molimo unesite minimalno 5 znakova.'. "\n";
        }

        $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
        if(! preg_match($pattern, $password)){
            $msg .= 'Lozinka mora sadržavati minimalno 8 znakova, jedno malo slovo, jedno veliko slovo, brojčane vrijednosti i specijalni znak!'. "\n";
        }

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg .= "Netočan email format!". "\n";
        }


        $dt = new DateTime();
        $dt->modify('-5 year');
        $date = new DateTime($bdate);

        if ($dt < $date) {
            $msg .= 'Krivi datum'. "\n";
        }

        if ($cookie !== 'on') {
            $msg .= 'Uvjeti korištenja cookies su obavezni'. "\n";
        }

        if ($password !== $password_confirmed) {
            $msg .= 'Lozinke se ne podudaraju'. "\n";
        }

        $_SESSION['name_surname'] = $name_surname;
        $_SESSION['bdate'] = $bdate;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['cookie'] = $cookie;

        // verify the response
        //if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
            if (empty($msg)) {
                $sql = "INSERT INTO korisnik (ime_prezime, korisnicko_ime, lozinka, lozinka_256, datum_rodenja, email_adresa, 
                    broj_neispravnih_prijava, datum_registracije, blokiran, uloga_id, aktivacijski_kod) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $code = $this->db->generateHash();
                //aktivacijski_kod ??,        uvjeti_koristenja ??
                $data = $this->db->Insert($sql, [
                    'ssssssisiis',
                    $name_surname,
                    $username,
                    $password,
                    hash('sha256', $password),
                    $bdate,
                    $email,
                    0,
                    date('Y-m-d h:i:s'),
                    1,
                    3,
                    $code
                ]);
    
                $link = "https://barka.foi.hr/WebDiP/2021_projekti/WebDiP2021x074/pages/aktivacija.php?code=" . $code;
    
                $to_email = $email; //omilermat@foi.hr
                $subject = 'Namjestaj - Aktivacija racuna';
                $message = 'Kliknite na poveznicu za aktivaciju računa: ' . $link;
                $from = 'From: noreply@barka.foi.hr';
    
                if(mail($to_email, $subject, $message, $from)){}
      

                unset(
                    $_SESSION['msg'],
                    $_SESSION['name_surname'],
                    $_SESSION['bdate'],
                    $_SESSION['email'],
                    $_SESSION['username'],
                    $_SESSION['cookie']
                );
                //echo '<meta http-equiv="Refresh" content="0; url=\'./?page=home\'" />';
                header("Location: ./?page=home" );
            } else {
                $_SESSION['msg'] = $msg;
                header("Location: ./?page=signupPage" );
            }
        //} else {
            
        //}

        




    }
}


?>
