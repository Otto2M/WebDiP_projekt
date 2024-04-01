<?php
require_once(__DIR__ .'/main.php');

if (isset($_SESSION) && isset($_SESSION['id'])) {
    $sql = "SELECT id FROM korisnik WHERE id = ?";
    $data = $db->Select($sql, ['i', $_SESSION['id']]);
    $data = $data[0] ?? $data;

    if (isset($data)) {
        $sql = "UPDATE korisnik SET use_cookies = 1 WHERE id = ?";
        # $data = $db->Update($sql, ['i', $data['id']]);
        setcookie('use_cookies', 1, time() + ($konfiguracija['trajanje_kolacica'] * 30), "/"); // 86400 = 1 day
    }
} else {
    setcookie('use_cookies', 1, time() + ($konfiguracija['trajanje_kolacica'] * 30), "/"); // 86400 = 1 day
}

header("Content-Type: application/json");
exit(json_encode([
    'message' => 'Cookies upisanie:'
]));
