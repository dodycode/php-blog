<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['admin'] = null;
unset($_SESSION['admin']);
session_unset();
session_destroy();
header('Location: ../index.php');