<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
}
$ubicacion = "/UserController.php";
$user = $_SESSION["user"];

include_once("../view/header.php");
include_once("../view/navbar.php");
include_once("../view/shared.php");
include_once("../view/table.php");
include_once("../view/formUser.php");
include_once("../view/footer.php");
include_once("../Service/UserService.php");

$header = array("USUARIO", "ESTADO", "NOMBRES", "APELLIDO PATERNO", "APELLIDO MATERNO", "DOCUMENTO");
$users = new UserService();
$title = "Usuarios";

Header::show($title);
Navbar::show($ubicacion, $user["PRIVILEGIOS"]);
Shared::showTitle("Usuarios");
switch ($_GET["action"]) {
    case "new":
        FormUser::show($users->listarRoles());
        if (isset($_GET["conf"])) {
            $user = new UsuarioNuevoDTO();
            $user->setApMaterno($_POST["apMaterno"]);
            $user->setApPaterno($_POST["apPaterno"]);
            $user->setNombre($_POST["nombre"]);
            $user->setDocumento($_POST["documento"]);
            $user->setEmail($_POST["correo"]);
            $user->setNumero($_POST["numero"]);
            $user->setUsuario($_POST["usuario"]);
            $user->setEstado($_POST["activo"] == null ? 0 : 1);
            $user->setReset($_POST["reset"] == null ? 0 : 1);
            $roles = $users->listarRoles();
            $rolesAsignados = array();
            foreach ($roles as $rol) {
                array_push($rolesAsignados, $_POST[$rol[1]]);
            }
            try {
                $users->guardarUsuario($user, $rolesAsignados);
                header("Location: ./UserController.php");
            } catch (Exception $ex) {
                echo ($ex->getMessage());
            }
            header("Location: ./UserController.php");
        }
        break;

    case "edit":
        FormUser::show($users->listarRoles());
        if ($_GET["conf"] != null) {
            header("Location: ../Controller/UserController.php");
        }
        break;

    case "delete":
        Shared::showMessage("./UserController.php", $_GET["id"]);
        if (isset($_GET["conf"])) {
            if ($_GET["conf"] == "1") {
                echo ($_GET["id"]);
                $users->borrarUser($_GET["id"]);
                header("Location: ./UserController.php");
            }
            header("Location: ./UserController.php");
        }
        break;

    default:
        Table::show($header, $users->listarUsuarios($user["USUARIO"]), "./UserController.php", 1, 5);
}
Footer::show();
