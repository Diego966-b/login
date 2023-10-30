<?php

class Session {
	
	
	
	public function __construct() {
		session_start();
	     }
	
	public function iniciar($nombreUsuario,$psw) {
		$_SESSION['usnombre']=$nombreUsuario;
		$_SESSION['uspass']=$psw;
	}
	
	
	
	public function validar() {
		$resp=false;
		$usuario=new AbmUsuario();
		
		$lista=$usuario->buscar($_SESSION);
		if ($lista!=null) {
			$resp=true;
		}
		return $resp;
	}
	
	public function activa() {
		$resp=false;
		if (session_status()=== PHP_SESSION_ACTIVE) {
			$resp=true;
		}
		return $resp;
	}
	
	public function getUsuario() {
		if ($this->validar() && $this->activa()) {
			$usuario=new AbmUsuario();
			$lista=	$usuario->buscar($_SESSION);
			

			$usuarioLog=$lista[0];
			}
			return $usuarioLog;
	}
	 
	 public function getRol() {
	 	if ($this->getUsuario()!==null) {
	 		$usuarioLog=$this->getUsuario();
	 		$param=array();
	 		$param['idusuario']=$usuarioLog->getIdUsuario();
	 		$objTransUsRol=new AbmUsuarioRol();
	 		$lista=$objTransUsRol->buscar($param);
	 		$objRol=$lista[0];
	 		$param1=array();
	 		$param1['idrol']=$objRol->getIdRol();
	 		$objTransRol=new AbmRol();
	 		$lista=$objTransRol->buscar($param1);
	 		$objRol=$lista[0];
	 		
	 	}
	 	return $objRol;
	 	}
	 	
	 	public function cerrar() {
	 		if ($this->activa()) {
	 			unset($_SESSION['usnombre']);
	 			unset($_SESSION['uspass']);
	 			session_destroy();
	 		}
	 	}
	 }

