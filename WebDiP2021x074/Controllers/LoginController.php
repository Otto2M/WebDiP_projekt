<?php

class LoginController {

    private $username = null;
    private $password = null;

    public function __construct($db) {
        $this->db = $db;
        $this->action = $_GET['action'] ?? '';
        $this->id = $_GET['id'] ?? '';
    }

    public function login($username, $password) {
        $konf = $this->db->Select('SELECT * FROM konfiguracija WHERE id=1');
        $konf = $konf[0];
        $sql = "SELECT korisnicko_ime, lozinka_256, broj_neispravnih_prijava, uloga_id, id FROM korisnik WHERE korisnicko_ime = ? AND blokiran = ?";
        $data = $this->db->Select($sql, ['si', $username, 0]);
        $data = $data[0] ?? $data;
        $br_ne_prijava = $konf['broj_neuspjesnih_prijava'] ?? 3;
        if(isset($data['lozinka_256']) && hash('sha256', $password) == $data['lozinka_256'])
        {
            $_SESSION['uloga_id'] = $data['uloga_id'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['korisnicko_ime'] = $data['korisnicko_ime'];
            $this->db->dnevnik("Uspješna prijava ", $data['id'], 2);
            $sql = "UPDATE korisnik SET broj_neispravnih_prijava = ? WHERE korisnicko_ime = ?";
            $data = $this->db->Update($sql, ['is', 0, $username]);
            setcookie('korisnicko_ime', $username, time() + ($konf['trajanje_kolacica'] * 30), "/"); // 86400 = 1 day
            // header("Location: ./?page=" . 'home' );
            echo '<meta http-equiv="Refresh" content="0; url=\'./?page=home\'" />';
        }
        else {

            //echo "Ne uspješno!";
            if(isset($data['broj_neispravnih_prijava']) && $data['broj_neispravnih_prijava'] > $br_ne_prijava) {
                $sql = "UPDATE korisnik SET blokiran = ? WHERE korisnicko_ime = ?";
                $data = $this->db->Update($sql, ['is', 1, $username]);
                $this->db->dnevnik("Blokiranje korisnika ", $data['id'], 6);
            }
            else {
                $sql = "UPDATE korisnik SET broj_neispravnih_prijava = broj_neispravnih_prijava + 1 WHERE korisnicko_ime = ?";
                $data = $this->db->Update($sql, ['s', $username]);
            }
            // header("Location: ./?page=" . 'loginPage' );
            echo '<meta http-equiv="Refresh" content="0; url=\'./?page=loginPage\'" />';
        }
        
    }

    public function logout() {
        $this->db->dnevnik("Uspješna odjava ", $_SESSION['id'], 1);
        session_unset();
        session_destroy();
        session_start();
        echo '<meta http-equiv="Refresh" content="0; url=\'./?page=home\'" />';
    }
}

