<?php
$title="logout";
include_once("views/layouts/header.php");
include_once('app/middlewares/auth');
unset($_SESSION['user']);
header("location:login.php");