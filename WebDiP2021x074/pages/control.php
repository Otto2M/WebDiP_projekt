<?php

$username = $_GET['username'];
$sql = "SELECT count(*) AS num FROM korisnik WHERE korisnicko_ime = ? ";
$data = $db->Select($sql, ['s', $username]);
$data = $data[0] ?? $data;


header("Content-Type: application/json");
exit(json_encode($data));
