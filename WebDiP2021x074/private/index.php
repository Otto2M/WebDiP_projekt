<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Privatno"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Pristup nije dozvoljen';
    exit;
} else {
    $pass = '8986de5b6ea58d98b5d807f1673151dec6461df7a19e636f657520a8050a8f9b55c8521c3a367ce7b25cbe2378022cc60bad577340d2f08d14bce8ee8a513695';
    if ($_SERVER['PHP_AUTH_USER'] === "WebDiP2021x074" && hash('sha512', $_SERVER['PHP_AUTH_PW']) === $pass ) {
        require_once('../pages/main.php');
        $data = $db->Select('SELECT korisnicko_ime, lozinka FROM korisnik');
        foreach($data as $row) {
            echo '<span style="padding: 15px">' . $row['korisnicko_ime'] . '</span> ' .  $row['lozinka'] . '<br>';
        }
    } else {
        header('WWW-Authenticate: Basic realm="Privatno"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Pristup nije dozvoljen kriva lozinka';
    }
}
