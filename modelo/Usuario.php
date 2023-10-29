<?php
class Usuario
{
    private $idUsuario;
    private $usNombre;
    private $usPass;
    private $usMail; //referencia a la persona
    private $usDeshabilitado;
    private $mensajeOperacion;
    //constructores
    public function __construct()
    {
        $this->idUsuario = '';
        $this->usNombre = '';
        $this->usPass = '';
        $this->usMail = '';
        $this->usDeshabilitado = '';
        $this->mensajeOperacion = '';
    }
    public function setear($idUsuario, $usNombre, $usPass, $usMail, $usDeshabilitado)
    {
        $this->setIdUsuario($idUsuario);
        $this->setUsNombre($usNombre) ;
        $this->setUsPass($usPass);
        $this->setUsMail($usMail);
        $this->setUsDeshabilitado($usDeshabilitado);
    }
    //sets
    public function setIdUsuario($value)
    {
        $this->idUsuario= $value;
    }
    public function setUsNombre($value)
    {
        $this->usNombre = $value;
    }
    public function setUsPass($value)
    {
        $this->usPass= $value;
    }
    public function setUsMail($value)
    {
        $this->usMail= $value;
    }
    public function setUsDeshabilitado($value)
    {
        $this->usDeshabilitado= $value;
    }
    public function setMensajeOperacion($mensajeOperacionNuevo)
    {
        $this->mensajeOperacion = $mensajeOperacionNuevo;
    }
    // gets
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function getUsNombre()
    {
        return $this->usNombre;
    }
    public function getUsPass()
    {
        return $this->usPass;
    }
    public function getUsMail()
    {
        return $this->usMail;
    }
    public function getUsDeshabilitado()
    {
        return $this->usDeshabilitado;
    }
    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }
    // Metodos propios
    // mepa que esta al re pedo
    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario WHERE idUsuario = " . $this->getIdUsuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();

                    $idUsuario = $row['idUsuario'];
                    $usNombre = $row['usNombre'];
                    $usPass = $row['usPass'];
                    $usMail = $row['usMail'];
                    $usDeshabilitado = $row['usDeshabilitado'];
                    $this->setear($idUsuario, $usNombre, $usPass, $usMail,$usDeshabilitado);
                    // $resp=true; veremos aqui si va o no
                }
            }
        } else {
            $this->setmensajeoperacion("Usuario->listar: " . $base->getError());
            // echo "error al cargar";
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        // no paso el id por que es autoIncrement
        $sql = "INSERT INTO usuario (usNombre,usPass,usMail,usDeshabilitado)  VALUES('" . $this->getUsNombre() . "','" . $this->getUsPass() . "','" . $this->getUsMail() . "','" . $this->getUsDeshabilitado() . "');";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("usuario->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuario->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE usuario SET idUsuario='" . $this->getIdUsuario() . "',usNombre='" . $this->getUsNombre() . "',usPass='" . $this->getUsPass()."',usMail='" . $this->getUsMail()."',usDeshabilitado='" . $this->getUsDeshabilitado()."' WHERE idUsuario='" . $this->getIdUsuario() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("usuario->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuario->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM usuario WHERE idUsuario=" . $this->getIdUsuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("usuario->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuario->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Usuario();
                    // $abmPersona = new AbmPersona();
                    $idUsuario = $row['idUsuario'];
                    $usNombre = $row['usNombre'];
                    $usPass = $row['usPass'];
                    $usMail = $row['usMail'];
                    $usDeshabilitado = $row['usDeshabilitado'];
                    $obj->setear($idUsuario, $usNombre, $usPass, $usMail,$usDeshabilitado);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("usuario->listar: " . $base->getError());
        }
        return $arreglo;
    }
    public function __toString()
    {
        $frase =
            "El Id del Usuario es: " . $this->getIdUsuario() .
            ".<br>El nombre es: " . $this->getUsNombre() .
            ".<br>La password es: " . $this->getUsPass() .
            ".<br>El mail es: " . $this->getUsMail().
            ".<br>su estado es: " . $this->getUsDeshabilitado();
        return $frase;
    }
}
