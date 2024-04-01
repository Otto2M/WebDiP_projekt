<?php

ini_set('log_errors', 1);
ini_set('error_log',  __DIR__ .'/error.log');

require_once(__DIR__ . '/../database.php');
$config = require_once(__DIR__ . '/../config.php');

try {
    $db = new DatabaseClass($config['dbhost'], $config['dbname'], $config['username'], $config['password']);
} catch (Exception $e) {
    echo $e->getMessage();
}
$konfiguracija = $db->Select('SELECT * FROM konfiguracija WHERE id=1');
$konfiguracija = $konfiguracija[0];

ini_set('session.save_path', __DIR__. '/../session');
ini_set( "session.gc_maxlifetime", $konfiguracija['trajanje_sesije'] ); //Set the maxlifetime of the session
ini_set( "session.cookie_lifetime", $konfiguracija['trajanje_kolacica'] ); //Set the cookie lifetime of the session 
session_start();

$uloga = $_SESSION['uloga_id'] ?? 0;

if ($uloga !== 1 && $konfiguracija['odrzavanje'] === 1) {
#
    require_once(__DIR__ . '/odrzavanje.php');
    exit();
}

$page = (empty($_GET['page']) || $_GET['page'] === 'null') ? '' : $_GET['page'];

if($page == "") {
    header("Location: ./?page=home");
}
