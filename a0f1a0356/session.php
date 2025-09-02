<?php
session_start();
if (!isset($_SESSION['level']) || $_SESSION['level'] != 'anggota') {
    header('location:../login.php?code=5');
    exit();
}
?>
