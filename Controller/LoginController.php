<?php
if (!isset($_POST["login"])) {
    header("Location: ../index.php");
}

include_once("../Service/AuthService.php");
include_once("../DTO/LoginDTO.php");

$auth = new AuthService();
$login = new LoginDTO();
$login->setUsuario($_POST["user"]);
$login->setPassword($_POST["pass"]);
$user = $auth->Login($login);

if (count($user) == 0) {
    header("Location: ../index.php?error=1");
}

session_start();
$_SESSION["user"] = $user;

include_once("../view/header.php");
include_once("../view/navbar.php");
include_once("../view/principal.php");

$title = "Inicio";
$ubicacion = "home";

Header::show($title);
Navbar::show($ubicacion, $user["PRIVILEGIOS"]);
Principal::show($user["NOMBRES"]);
