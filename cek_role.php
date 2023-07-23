<?php
session_start();

if ($_SESSION['role_id'] == 2) {
    header("Location: ../index.php");
}