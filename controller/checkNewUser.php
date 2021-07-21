<?php 
    $mail = $_POST['email'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $nomyape = $_POST['name'];
   
    
    if ($pass1 == $pass2){
        require_once("../model/Usuario.php");
        $usuario = new Usuario($mail, $pass1,$nomyape);

        require_once("../dao/UsuarioDAO.php");
        $usuarioDAO = new UsuarioDao();
        $usuarioOk = $usuarioDAO->guardarUsuario($usuario);
    } else{
        echo "Las contraseñas no coinciden";
    }


  
?>