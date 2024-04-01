<?php

require_once(__DIR__ .'/main.php');

$code = $_GET['code'] ?? "";
$sql = "SELECT id FROM korisnik WHERE aktivacijski_kod = ?";
$data = $db->Select($sql, ['s', $code]);
$data = $data[0] ?? $data;

if(isset($data)) {
    $sql = "UPDATE korisnik SET blokiran = 0, aktivacijski_kod = ? WHERE id = ?";
    $data = $db->Update($sql, ['si', $db->generateHash(), $data['id']]);
}

header("Location: ../?page=loginPage");

