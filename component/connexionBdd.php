<?php
// $host = '10.29.254.18';
// $username = 'sts15';
// $password = 'sts15';
// $dbname = 'ocsweb';

$host = 'localhost';
$username = 'myroot';
$password = 'root123*';
$dbname = 'projet-ordinateur-ocs';

$conn = new mysqli($host ,$username, $password , $dbname);
// var_dump($conn);

if ($conn->connect_error) {
    die("Erreur de connexion MySQL : (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
} else {
    // echo "Connexion réussie !";
}

?>
