<?php

class ForgottenPasswordController {

    private $email = null;
    private $newPass = null;
    private $newPass_256 =  null;

    public function __construct($db) {
        $this->db = $db;
        $this->action = $_GET['action'] ?? '';
        $this->email = $_GET['email'] ?? '';
    }

    public function sentNewPassword($email) {

        $newPass = $this->db->randomPassword();
        $newPass_256 = hash('sha256', $newPass);

        $to_email = $email;
        $subject = 'Nova lozinka';
        $message = 'Nova lozinka za prijavu: ' . $newPass;
        $from = 'From: noreply@barka.foi.hr';
        mail($to_email, $subject, $message, $from);

        $sql = "UPDATE korisnik SET lozinka = ?, lozinka_256 = ? WHERE email_adresa = ?"; //    ??? email
        $data = $this->db->Update($sql, ['ssi', $newPass, $newPass_256, $email]);

        echo '<meta http-equiv="Refresh" content="0; url=\'./?page=loginPage\'" />';
    }

}