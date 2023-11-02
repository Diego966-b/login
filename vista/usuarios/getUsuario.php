<?php 
    include_once("../../config.php");
  
    $con= new mysqli('localhost','root','','bdautenticacion');
    $id= $con->real_escape_string($_POST['id']);
    
    $usuario= new Usuario;
    $users =$usuario->listar();
    foreach($users as $user){
        if($user->getIdUsuario()==$id){
            $usuarioFinal=["id"=>$user->getIdUsuario(),"nombre"=>$user->getUsNombre(),"mail"=>$user->getUsMail(),"password"=>$user->getUsPass()];
            echo json_encode($usuarioFinal, JSON_UNESCAPED_UNICODE);
        }
    }
?>