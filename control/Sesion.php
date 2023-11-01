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
    
    public function __construct()
    {
        session_start();
    }

    public function iniciar ($nombreUsuario, $contrasenia)
    {          
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
        return $_SESSION;
    }

    public function activa ()
    {
        $activa = false;
        if (session_id())
        {
            $activa = true;
        }
        return $activa;
    }

    public function validar(){
        $inicia=false;
        if(isset($_SESSION['idusuario'])){
           $inicia=true;
        }
        return $inicia;
    }

    public function cerrar ()
    {
        $exito = false;
        if (session_destroy())
        {
            $exito = true;
        }
        return $exito;
    }

    public function getUsuario(){
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
    }

    public function getRol(){
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
    }

    // Método __toString

    /**
     * Devuelve en un string los valores de los atributos
     * @return string
     */
    public function __toString ()
    {
        // Variables Internas
        // string $frase
        $frase = "";
        return $frase;
    }
}