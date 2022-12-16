<?php
require_once("../Data/DbConnection.php");
require_once("../Model/User.php");

class UserRepository
{
    public function __construct()
    {
    }

    public function SelUser(User $model)
    {
        $connection = DbConnection::connect();
        $sql = "CALL SP_SEL_USER(:P_SUSER)";
        $stm = $connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->bindValue(':P_SUSER', $model->getUser(), PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function SelRoles()
    {
        $connection = DbConnection::connect();
        $sql = "CALL SP_SEL_ROLES()";
        $stm = $connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->execute();
        return $stm->fetchAll();
    }

    public function InsUser(UsuarioNuevo $model)
    {
        $connection = DbConnection::connect();
        $sql = "CALL SP_INS_USER(:P_SDOCUMENT, :P_SNOMBRE, :P_SAPELLIDO_PAT, :P_SAPELLIDO_MAT, :P_SEMAIL, :P_SNUMBER, :P_NSTATUS, :P_SUSER, :P_BPASSWORD_RESET)";
        $stm = $connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->bindValue(':P_SDOCUMENT', $model->getDocumento(), PDO::PARAM_STR);
        $stm->bindValue(':P_SNOMBRE', $model->getNumero(), PDO::PARAM_STR);
        $stm->bindValue(':P_SAPELLIDO_PAT', $model->getApPaterno(), PDO::PARAM_STR);
        $stm->bindValue(':P_SAPELLIDO_MAT', $model->getApMaterno(), PDO::PARAM_STR);
        $stm->bindValue(':P_SEMAIL', $model->getEmail(), PDO::PARAM_STR);
        $stm->bindValue(':P_SNUMBER', $model->getNumero(), PDO::PARAM_STR);
        $stm->bindValue(':P_NSTATUS', $model->getEstado(), PDO::PARAM_INT);
        $stm->bindValue(':P_SUSER', $model->getUsuario(), PDO::PARAM_STR);
        $stm->bindValue(':P_BPASSWORD_RESET', $model->getReset(), PDO::PARAM_INT);
        $stm->execute();
    }

    public function InsRole(UsuarioPrivilegios $user)
    {
        $connection = DbConnection::connect();
        $sql = "CALL SP_INS_USER_PRIVILEGIOS(:P_SDOCUMENT, :P_NPRIVILEGIOS_ID)";
        $stm = $connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->bindValue(':P_SDOCUMENT', $user->getDocumento(), PDO::PARAM_STR);
        $stm->bindValue(':P_NPRIVILEGIOS_ID', $user->getRol(), PDO::PARAM_STR);
        $stm->execute();
    }

    public function DelUser($document)
    {
        $connection = DbConnection::connect();
        $sql = "CALL SP_DEL_USER(:P_SDOCUMENT)";
        $stm = $connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->bindValue(':P_SDOCUMENT', $document, PDO::PARAM_STR);
        $stm->execute();
    }
}
