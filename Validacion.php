<?php
abstract class Validacion {

    private $metodo;
    private $errors = [];
    private $usuario;
    /*
    function __construct($arrayMetodo){
         $this->setMetodo($arrayMetodo);
        }
        */
    /**
     * Post: Valida el usuario ingresado al
     * sistema.
     */
    
    /**
     * TO DO // @NAY.
     * Post: Procesa validacion de registro.
     */


    protected function addError($pos,$msj){
        $this->errors[$pos][] = $msj;
    }
    /**
     * Post: Devuelve si el Pedido fue hecho por Post
     */
    protected function esMethodPost(){
        return $_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST);
    }

    /**
     * Post: Devuelve si existe posicion en $_POST
     */
    protected function existePosicion($posicion){
        return isset($_POST[$posicion]);
    }

    /**
     * Post: Devuelve si hay un archivo
     */
    protected function existePosicionFile($posicion){
        return isset($_FILES[$posicion]);
    }

    /**
     * Post: Devuelve si el campo consultado esta vacio.
     */
    protected function estaVacioElCampo($posicion){
        return empty($this->getUsuario()->getUsuario());
    }

    protected function estaVacioElArchivo($posicion){
        return empty($_FILES[$posicion]);
    }

    /**
     * Pre: Se ingresa valor minimo y maximo.
     * Post: Valida que password este entre minimo y maximo.
     */
    protected function validaAncho($minimo,$maximo,$campo){
        return (strlen($campo) > $minimo) &&
        (strlen($campo)<$maximo);
     }

     /**
      * Pre: Se ingresan 2 campos para verificar igualdad.
      * Post: Devuelve si existe igualdad.
      */
      protected function validarIgualdadEntreCampos($campo1,$campo2){
          return $campo1 == $campo2;
      }

    /**
     * Post: Devuelve si es valido el email ingresado.
     */
    protected function esCampoDeEmailValido(){
        return filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    }

    /**
     * Post: Obtiene usuario de Json, si no lo encuentra retorna null.
     */
    protected function obtenerUsuarioIngresado(){
        $data = file_get_contents('usuarios.json');
        $usuarios = json_decode ($data, true);
        $usuarioEncontrado = null;
        foreach ($usuarios as $usuario) {
            if ($usuario['usuario']['usuario'] === $this->getUsuario()->getUsuario() && password_verify($this->getUsuario()->getPassword(),$usuario['usuario']['password'])){
                $usuarioEncontrado = $usuario['usuario'];
            }
        }
        return $usuarioEncontrado;
    }

    // Getters & Setters :)

    /**
     * Get the value of method
     */
    protected function getMetodo()
    {
        return $this->metodo;
    }

    /**
     * Set the value of method
     *
     * @return  self
     */
    protected function setMetodo($metodo)
    {
        $this->metodo = $metodo;

        return $this;
    }

    /**
     * Get the value of errors
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set the value of errors
     *
     * @return  self
     */
    protected function setErrors($errors)
    {
        $this->errors = $errors;

        return $this;
    }

    /**
     * Get the value of usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }
}
?>
