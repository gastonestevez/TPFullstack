<?php
class Validacion {
    
    private $metodo;
    private $errors = [];
    private $usuario;
    private $password;

    /**
     * Constructor
     * Pre: Obtiene el $_POST, 
     * Post: Crea objeto validacion 
     */
    function __construct($arrayMetodo){
        $this->setMetodo($arrayMetodo);
        $this->setUsuario('');
        $this->setPassword('');
    }

    public function procesarLogin(){
        if($this->esMethodPost()){
            $this->setUsuario($this->getMetodo()['usuario']);
            $this->setPassword($this->getMetodo()['password']);
           if(!$this->existePosicion('usuario')){
            $this->addError('usuario','Ingresa su nombre de usuario');
           }else if($this->estaVacioUsuario()){
            $this->addError('usuario','El usuario es requerido');
           }
         
           if(!$this->existePosicion('password')){
            $this->addError('password','Ingrese su contraseña');
           }else if(!$this->validaAncho(5,13,$this->getPassword())){
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
    
    protected function existePosicionFile($posicion){
        return isset($_FILES[$posicion]);
    }
    
    /**
     * Post: Devuelve si el campo consultado esta vacio.
     */
    protected function estaVacioElCampo($posicion){
        return empty($_POST[$posicion]);
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
            
            if ($usuario['usuario'] === $_POST['usuario'] && password_verify($_POST['password'],$usuario['password'])){
                $usuarioEncontrado = $usuario['usuario'];
            }
        }
        return $usuarioEncontrado;
    }

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
    protected function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    protected function setPassword($password)
    {
        $this->password = $password;

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
}
?>