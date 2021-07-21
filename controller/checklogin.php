<?php 
    require_once("../dao/UsuarioDAO.php");

    $usuarioDAO = new UsuarioDAO();
    $usuValido = $usuarioDAO->validarUsuarioYPass($_POST['inputEmail'], $_POST['inputPassword']);

    if($usuValido) {
        header("Location: ../view/pedido.html");
        exit;
    } else {
        echo "<script>
            window.location.href='../view/login.html';
            alert('Usuario o contraseña incorrecto');
            </script>";
    }


?>