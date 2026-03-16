<?php
$env = parse_ini_file(__DIR__ . '/.env');

$host   = $env["HOSTNAME"];
$dbname = $env["DBNAME"];
$user   = $env["LOGIN"];
$pass   = $env["MDP"];

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );

} catch (Exception $e) {
    die("Erreur connexion BDD : " . $e->getMessage());
}
