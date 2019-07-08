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
    public abstract function validarUsuario();

    /**
     * Post: Procesa validacion de registro.
     */
    public function procesarRegistro(){
        $nuevoUsuario = new Usuario('','','','','','','',);
        if($this->esMethodPost()){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $user = $_POST['usuario'];
            $email = $_POST['email'];
            $nacimiento = $_POST['fechanacimiento'];
            $provincia = $_POST['provincia'];
            $pass1 = $_POST['pass'];
            $pass2 = $_POST['passconf'];
            $avatar = $_FILES['avatar'];
            $nuevoUsuario = new Usuario($nombre,$apellido,$user,$email,$nacimiento,password_hash($_POST['pass'],PASSWORD_DEFAULT),$provincia);
            if(!$this->existePosicion('email')){
                  $this->addError('email','Falta el campo email');
                }else{
                  if($this->estaVacioElCampo('email')){
                    $this->addError('email','El email es requerido.');
                  }
                  if(!$this->esCampoDeEmailValido()){
                    $this->addError('email','El email no es valido');
                    }
                }
          
                if(!$this->existePosicion('nombre')){
                    $this->addError('nombre','Falta el campo nombre');
                }else if($this->estaVacioElCampo('nombre')){
                    $this->addError('nombre','El nombre es requerido');
                }
          
                if(!$this->existePosicion('apellido')){
                    $this->addError('apellido','Falta el campo apellido');
                }else if($this->estaVacioElCampo('apellido')){
                    $this->addError('apellido','El apellido es requerido');
                }
          
                if(!$this->existePosicion('usuario')){
                    $this->addError('usuario','Falta el campo nombre');
                }else if($this->estaVacioElCampo('usuario')){
                    $this->addError('usuario','El usuario es requerido');
                }else if(!$this->validaAncho(5,12,$user)){
                    $this->addError('usuario','El usuario debe tener entre 6 y 12 caracteres');
                }
          
                if(!$this->existePosicion('fechanacimiento')){
                    $this->addError('fechanacimiento','Falta el campo fecha');
                  }else if($this->estaVacioElCampo('fechanacimiento')){
                    $this->addError('fechanacimiento','Ingrese una fecha');
                }
          
                if(!$this->existePosicion('pass') || !$this->existePosicion('passconf')){
                    $this->addError('password','Falta el campo password');
                }else if(!$this->validarIgualdadEntreCampos($pass1,$pass2)){
                    $this->addError('password','Las contraseñas no coinciden');
                }else if(!$this->validaAncho(5,13,$pass1)){
                    $this->addError('password', 'El password debe tener entre 6 y 12 caracteres');
                }
          
                if($this->existePosicion('provincia')){
                  if ($provincia == 'seleccion'){
                    $this->addError('provincia','Debes seleccionar una opcion');
                }
                  }
          
                if(!$this->existePosicionFile('avatar')){
                    $this->addError('avatar','Debe cargar un avatar');
                }else if($this->estaVacioElArchivo('avatar')){
                    $this->addError('avatar','El avatar es requerido');
                }
                if(!$this->existePosicion('terminos')){
                    $this->addError('terminos','Debe aceptar los terminos y condiciones para pode continuar');
                }
              if(empty($this->getErrors())){
                $archivo = $_FILES['avatar']['tmp_name'];
                $nombreArchivo = $_FILES['avatar']['name'];
                $extension = pathinfo($nombreArchivo,PATHINFO_EXTENSION);
                $miArchivo = 'media/';
                $miArchivo = $miArchivo . md5($nombreArchivo) . '.' . $extension;
                move_uploaded_file($archivo,$miArchivo);
                $nuevoUsuario->setAvatar($miArchivo);
          
                  $archivo = 'usuarios.json';
          
                  $usuarios = file_get_contents($archivo);
                  $usuariosDecoded = json_decode($usuarios,true);
                  $usuariosDecoded[] = $nuevoUsuario;
                  $jsonFinal = json_encode($usuariosDecoded, JSON_PRETTY_PRINT);
                  file_put_contents($archivo,$jsonFinal);
                  header('location:index.php');
              }
          }
        $this->setUsuario($nuevoUsuario);
    }

    /**
     * Post: Procesa validacion de login.
     */
    public function procesarLogin(){
        if($this->esMethodPost()){
            
           if(!$this->existePosicion('usuario')){
            $this->addError('usuario','Ingresa su nombre de usuario');
           }else if($this->estaVacioElCampo('usuario')){
            $this->addError('usuario','El usuario es requerido');
           }
         
           if(!$this->existePosicion('password')){
            $this->addError('password','Ingrese su contraseña');
           }else if(!$this->validaAncho(5,13,$passUsuario)){
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
        $this->setUsuario($nuevoUsuario);
    }

    /**
     * Pre: Requiere Posicion y mensaje.
     * Post: Agrega un error al array.
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