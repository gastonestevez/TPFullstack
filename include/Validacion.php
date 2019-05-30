<?php
class Validacion {
    /**
     * Constructor
     * Pre, Post: 
     */
    function Validacion(){

    }

    /**
     * Post: Devuelve si el Pedido fue hecho por Post
     */
    public function esMethodPost(){
        return $_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST);
    }

    /**
     * Post: Valida que el array tenga posicion usuario.
     */
    public function esUsuario(){
        return isset($_POST['usuario']);
    }

    /**
     * Post: Valida que el campo usuario no este vacio.
     */
    public function estaVacioUsuario(){
        return empty($_POST['usuario']);
    }

    /**
     * Post: Valida que el array tenga posicion password.
     */
    public function esPassword(){
        return isset($_POST['password']);
    }

    /**
     * Pre: Se ingresa valor minimo y maximo.
     * Post: Valida que password este entre minimo y maximo.
     */
    public function validaAnchoDePassword($minimo,$maximo){
       return (strlen($_POST['password']) > $minimo) &&
       (strlen($_POST['password'])<$maximo);
    }

    /**
     * Post: Obtiene usuario de Json, si no lo encuentra retorna null.
     */
    public function obtenerUsuarioIngresado(){
        $data = file_get_contents('usuarios.json');
        $usuarios = json_decode ($data, true);
        $usuarioEncontrado = null;
        foreach ($usuarios as $usuario) {
            
            if ($usuario['usuario'] === $_POST['usuario'] && password_verify($_POST['password'],$usuario['password'])){
                $usuarioEncontrado = $usuario['usuario'];
                var_dump($usuarioEncontrado);
            }
        }
        return $usuarioEncontrado;
    }

}
?>