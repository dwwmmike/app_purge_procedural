<?php
session_start();
    if(!isset($_SESSION['utilisateurs'])){
        header('location:index.php');
    }
?>