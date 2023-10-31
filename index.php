<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
}

if($_SESSION["role"] == "admin") {
    header("Location: role_management.php");
} else if($_SESSION["role"] == "user") {
    header("Location: user_home.php");
} else if($_SESSION["role"] == "manager") {
    header("Location: manager_home.php");
}
?>
