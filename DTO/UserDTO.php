<?php
class UsuarioNuevoDTO
{
    private $documento;
    private $nombre;
    private $apPaterno;
    private $apMaterno;
    private $email;
    private $numero;
    private $estado;
    private $usuario;
    private $reset;

    public function getDocumento()
    {
        return $this->documento;
    }
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getApPaterno()
    {
        return $this->apPaterno;
    }
    public function setApPaterno($apPaterno)
    {
        $this->apPaterno = $apPaterno;
    }
    public function getApMaterno()
    {
        return $this->apMaterno;
    }
    public function setApMaterno($apMaterno)
    {
        $this->apMaterno = $apMaterno;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function getReset()
    {
        return $this->reset;
    }
    public function setReset($reset)
    {
        $this->reset = $reset;
    }
}
