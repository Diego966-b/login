<?php
class UsuarioRol
{
    private $objUsuario, $objRol, $mensajeOperacion;

    public function __construct()
    {
        $this->objUsuario = "";
        $this->objRol = "";
        $this->mensajeOperacion = "";
    }

    public function setear($objUsuario, $objRol)
    {
        $this -> setObjUsuario ($objUsuario);
        $this -> setObjRol ($objRol);
    }

    public function cargar()
    {
        $respuesta = false;
        $base = new BaseDatos();
        $objUsuario = $this->getObjUsuario();
        $objRol = $this->getObjRol();
        $sql = "SELECT * FROM rol WHERE idUsuario = " . $objUsuario->getIdUsuario()." AND idRol = ".$objRol->getIdRol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $abmUsuario = new AbmUsuario ();
                    $abmRol = new AbmRol ();
                    $array = [];
                    $array ['idUsuario'] = $row['idUsuario'];
                    $array ['idRol'] = $row['idRol'];

                    $objUsuario = $abmUsuario -> buscar ($array);
                    $objRol = $abmRol -> buscar ($array);
                    $this->setear($objUsuario, $objRol);
                }
            }
        } else {
            $this->setMensajeOperacion("usuarioRol->listar: " . $base->getError());
        }
        return $respuesta;
    }

    public function insertar()
    {
        $respuesta = false;
        $base = new BaseDatos();
        $objUsuario = $this->getObjUsuario();
        $objRol = $this->getObjRol();
        $sql = "INSERT INTO usuarioRol (idUsuario, idRol)
        VALUES ('" . $objUsuario->getIdUsuario() . "', '" . $objRol->getIdRol() . "')";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $respuesta = true;
            } else {
                $this->setMensajeOperacion("usuarioRol->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("usuarioRol->modificar: " . $base->getError());
        }
        return $respuesta;
    }

    public function modificar()
    {
        // No hay
    }

    public function eliminar()
    {
        $respuesta = false;
        $base = new BaseDatos();
        $objUsuario = $this->getObjUsuario();
        $objRol = $this->getObjRol();
        $sql = "DELETE FROM usuarioRol WHERE idUsuario = " . $objUsuario->getIdUsuario()." AND idRol = ".$objRol->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $respuesta = true;
            } else {
                $this->setMensajeOperacion("usuarioRol->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("usuarioRol->eliminar: " . $base->getError());
        }
        return $respuesta;
    }

    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos;
        $sql = "SELECT * FROM usuarioRol ";
        if ($parametro != "") {
            $sql .= "WHERE " . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $abmUsuario = new AbmUsuario ();
                    $abmRol = new AbmRol ();
                    $obj = new UsuarioRol();
                    $array = [];

                    $array ['idUsuario'] = $row['idUsuario'];
                    $objUsuario = $abmUsuario -> buscar ($array);
                    $array ['idRol'] = $row['idRol'];
                    $objRol = $abmRol -> buscar ($array);
                    
                    $obj->setear($objUsuario, $objRol);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeoperacion("usuarioRol->listar: " . $base->getError());
        }
        return $arreglo;
    }

    // Get

    public function getObjUsuario()
    {
        return $this->objUsuario;
    }
    
    public function getObjRol()
    {
        return $this->objRol;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeoperacion;
    }

    // Set

    public function setObjUsuario($objUsuarioNuevo)
    {
        $this -> objUsuario = $objUsuarioNuevo;
    }
    public function setObjRol($objRolNuevo)
    {
        $this -> objRol = $objRolNuevo;
    }
    public function setMensajeOperacion($mensaje)
    {
        $this -> mensajeoperacion = $mensaje;
    }
    
    // __toString

    public function __toString()
    {
        
    }
}