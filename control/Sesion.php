<?php
/*
Implementar dentro de la capa de Control la clase Session con los siguientes métodos:
• _ _construct(). Constructor que. Inicia la sesión.
• iniciar($nombreUsuario,$psw). Actualiza las variables de sesión con los valores ingresados.
• validar(). Valida si la sesión actual tiene usuario y psw  válidos. Devuelve true o false.
• activa(). Devuelve true o false si la sesión está activa o no. 
• getUsuario().Devuelve el usuario logeado.
• getRol(). Devuelve el rol del usuario  logeado.
• cerrar(). Cierra la sesión actual.
*/
class Sesion
{

    // Métodos 
    
    /**
     * Hace un session_start. 
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Guarda el ID de usuario en $_SESSION y retorna un booleano.
     * @return boolean
     */
    public function iniciar ($nombreUsuario, $contrasenia)
    {  
        $exito = false;
        $obj = new AbmUsuario();
        $param['usNombre'] = $nombreUsuario;
        $param['usPass'] = $contrasenia;
        $param['usDeshabilitado'] = "null"; 
        $resultado = $obj -> buscar ($param);
        
        // print_r($param);
        // echo "resultado:";
        // print_r($resultado);
        if (count($resultado) > 0)
        {
            echo "<h1>Count</h1>";
            $usuario = $resultado[0];
            $idUsuario = $usuario -> getIdUsuario();
            $_SESSION ['idUsuario'] = $idUsuario;
            $exito = true;
        }
        else
        {
            $this -> cerrar();
        }
        return $exito;
        /*
        $abmUsuario=new AbmUsuario();
        $where =['usNombre'=>$nombreUsuario,'usPass'=>$contrasenia];
        $listaUsuarios=$abmUsuario->buscar($where);
        if($listaUsuarios>=1){
            if($this->activa()){
                $_SESSION['usPass']=$listaUsuarios[0]->getUsPass();
                $_SESSION['idUsuario']=$listaUsuarios[0]->getIdUsuario();
                $_SESSION['usNombre']=$listaUsuarios[0]->getUsNombre();
                $_SESSION['autenticado'] = true;
                print_R($_SESSION);
            }
        }  
        */  
    }

    /**
     * Devuelve un booleano dependiendo de si la sesion esta activa o no 
     * @return boolean
     */
    public function activa ()
    {
        $resp = false;
        if (php_sapi_name() !== 'cli')
        {
            if (version_compare(phpversion(), '5.4.0', '>=')) 
            {
                $resp = session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            }
            else
            {
                $resp = session_id() === '' ? FALSE : TRUE;
            }
        }
        return $resp;
        /*
        $activa = false;
        if (session_id())
        {
            $activa = true;
        }
        return $activa;
        */
    }
    
    /**
     * Valida una sesion
     */
    public function validar(){
        $resp = false;
        if ($this -> activa() && isset($_SESSION['idUsuario']))
        {
            $resp = true;
        }
        return $resp;
        /*
        $inicia=false;
        if(isset($_SESSION['idusuario'])){
           $inicia=true;
        }
        return $inicia;
        */
    }

    /**
     * Cierra sesion. Retorna un booleano.
     * @return boolean
     */
    public function cerrar ()
    {
        $exito = false;
        if (session_destroy())
        {
            $exito = true;
        }
        return $exito;
    }

    /**
     * Devuelve el obj del usuario logeado.
     * Retorna null si no hay usuario logeado.
     */
    public function getUsuario(){
        $usuario = null;
        if ($this -> validar())
        {
            $obj = new AbmUsuario();
            $param ['idUsuario'] = $_SESSION['idUsuario'];
            $resultado = $obj -> buscar ($param);
            if (count($resultado) > 0)
            {
                $usuario = $resultado[0];
            }
            return $usuario;
        }
        /*
        $usuarioLog = "";
        if ($this->validar() && $this->activa()) {
            $abmUsuario=new AbmUsuario();
            $where =['usnombre'=>$_SESSION['usNombre'],'idUsuario'=>$_SESSION['idUsuario']];
            $listaUsuarios=$abmUsuario->buscar($where);
            if(count($listaUsuarios)>=1){
                $usuarioLog=$listaUsuarios[0];
            }
        }
        return $usuarioLog;
        */
    }

    /**
     * Devuelve obj rol del usuario logeado.
     * Retorna null si no hay usuario logeado.
     */
    public function getRol(){
        $listaRoles = null;
        if ($this -> validar())
        {
            $obj = new AbmUsuario();
            $param ['idUsuario'] = $_SESSION ['idUsuario'];
            $resultado = $obj -> buscar ($param); // Usa: $obj -> darRoles ($param);
            if (count($resultado) > 0)
            {
                $listaRoles = $resultado [0];
            }
            return $listaRoles;
        }

        /*
        $abmRol=new abmRol();
        $abmUsuarioRol=new AbmUsuarioRol();
        $usuario=$this->getUsuario();
        $idUsuario=$usuario->getIdUsuario();
        $param=['idUsuario'=>$idUsuario];
        $listaRolesUsu=$abmUsuarioRol->buscar($param);
        if(count($listaRolesUsu)>=1){
            $rol=$listaRolesUsu;
        }else{
            //$rol=$listaRolesUsu[0];
            $rol = null;
        }
        return $rol; 
        */
    }
}