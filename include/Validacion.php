<?php
class Validacion {
    /**
     * Constructor
     * Pre, Post: 
     */
    function __constructor(){

    }

    /**
     * Post: Devuelve si el Pedido fue hecho por Post
     */
    public function esMethodPost(){
        return $_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST);
    }

    /**
     * Post: Devuelve si existe posicion en $_POST
     */
    public function existePosicion($posicion){
        return isset($_POST[$posicion]);
    }
    
    public function existePosicionFile($posicion){
        return isset($_FILES[$posicion]);
    }
    
    /**
     * Post: Devuelve si el campo consultado esta vacio.
     */
    public function estaVacioElCampo($posicion){
        return empty($_POST[$posicion]);
    }

    /**
     * Pre: Se ingresa valor minimo y maximo.
     * Post: Valida que password este entre minimo y maximo.
     */
    public function validaAncho($minimo,$maximo,$campo){
        return (strlen($campo) > $minimo) &&
        (strlen($campo)<$maximo);
     }
 
     /**
      * Pre: Se ingresan 2 campos para verificar igualdad.
      * Post: Devuelve si existe igualdad.
      */
      public function validarIgualdadEntreCampos($campo1,$campo2){
          return $campo1 == $campo2;
      }

    /**
     * Post. Devuelve si existe el campo mail.
     */
    public function esEmail(){
        return isset($_POST['email']);
    }

    public function esCampoDeEmailValido(){
        return filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    }
    /**
     * Post: Devuelve si el campo mail esta vacio.
     */
    public function estaVacioEmail(){
        return empty($_POST['email']);
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
            }
        }
        return $usuarioEncontrado;
    }

}
?>