<?php
require_once("../Data/DbConnection.php");
require_once("../Model/LogIn.php");

class AuthRepository
{

    public function __construct()
    {
    }

    public function login(Login $model)
    {
        $connection = DbConnection::connect();
        $sql = "CALL SP_AUTH(:P_SUSER, :P_SPASSWORD) ";
        $stm = $connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->bindValue(':P_SUSER', $model->getUsuario(), PDO::PARAM_STR);
        $stm->bindValue(':P_SPASSWORD', $model->getPassword(), PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll();
    }
}
