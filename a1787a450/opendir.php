<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    // Mengarah ke folder control
            case 'control':
                $file_path = __DIR__ . "/Controls/Controls.php"; // Tentukan file yang benar di direktori control
                if (!file_exists($file_path)) {
                    die("File tidak ada");
                }
                include $file_path;
                break;
// Mengarah ke folder Views
            case 'views':
                $file_path = __DIR__ . "/Views/Views.php";
                if (!file_exists($file_path)) {
                    die("File tidak ada");
                }
                include $file_path;
                break;
// Mengarah ke folder forms
            case 'forms':
                $file_path = __DIR__ . "/forms/Forms.php"; // Tentukan file yang benar di direktori forms
                if (!file_exists($file_path)) {
                    die("File tidak ada");
                }
                include $file_path;
                break;
 // jika kosong
            case '':
                $file_path = __DIR__ . "/Views/Views.php";
                if (!file_exists($file_path)) {
                    die("File tidak ada");
                }
                include $file_path;
                break;
        }
?>
