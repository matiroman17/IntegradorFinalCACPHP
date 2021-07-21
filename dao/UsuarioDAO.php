<?php 

class UsuarioDAO {

    public function guardarUsuario($usuario){
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB("localhost","root","","cacproyecto");
        $conexionDB->conectar();
        $sql = "INSERT INTO `usuarios`(`usuario`, `clave`, `nombreyapellido`) VALUES 
        ('{$usuario->getUsuario()}',
            '{$usuario->getClave()}',
            '{$usuario->getNombreYApellido()}')";
        
        $conexionDB->ejecutar($sql);
        
        if ($conexionDB->cantFilas() > 0){
            echo "<script>
            window.location.href='../view/login.html';
            alert('Cuenta de Usuario creada correctamente');
            </script>";
        }else{
            echo "<script>
            window.location.href='../view/newUser.html';
            alert('Error al intentar crear la cuenta');
            </script>";
        }
    }
    public function validarUsuarioYPass($usuario, $contrasenia) {
        require_once("../dataBase/ConexionDB.php");

        $conexionDB = new ConexionDB("localhost","root","","cacproyecto");
        $conexionDB->conectar();
    
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$contrasenia'";
        $conexionDB->ejecutar($sql);
    
        return $conexionDB->cantFilas() > 0;
    }

    public function validarUsuario($usuario) {
        require_once("../dataBase/ConexionDB.php");

        $conexionDB = new ConexionDB("localhost","root","","cacproyecto");
        $conexionDB->conectar();
    
        $sql = "SELECT * FROM usuarios WHERE usuario = $usuario";
        $conexionDB->ejecutar($sql);
    
        return $conexionDB->cantFilas() > 0;        
    }
}

?>