<?php

include '../component/header.php';

if (isset($_SESSION)) {
    session_destroy();
}
header('Location: ./login.php');

include '../component/footer.php';
?>