<?php
require 'include/Validacion.php';

class ValidacionUsuario extends Validacion{

    

    public function validarUsuario(){
        if(null ==($this->getUsuario()->getUsuario())){
            $this->addError('usuario','Ingresa su nombre de usuario');
        }else if(empty($this->getUsuario()->getUsuario())){
            $this->addError('usuario','El usuario es requerido');
        }
         
        if(null == ($this->getUsuario()->getPassword())){
            $this->addError('password','Ingrese su contraseña');
        }else if(!$this->validaAncho(5,13,$this->getUsuario()->getPassword())){
            $this->addError('password','La contraseña debe tener entre 6 y 12 caracteres');
        }
         
        $usuarioEncontrado = $this->obtenerUsuarioIngresado();
         
        if ($usuarioEncontrado!=null && empty($errors)){
            $_SESSION['usuario'] = $usuarioEncontrado;
            header('Location: index.php');
        }else if($usuarioEncontrado==null){
            $this->addError('sin_usuario','El usuario no se encuentra registrado');
        }
         
    }
}