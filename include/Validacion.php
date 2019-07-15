<?php
abstract class Validacion {

    private $metodo;
    private $errors = [];
    private $usuario;
    
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
     * Pre: Se ingresa valor minimo y maximo.
     * Post: Valida que password este entre minimo y maximo.
     */
    protected function validaAncho($minimo,$maximo,$campo){
        return (strlen($campo) > $minimo) &&
        (strlen($campo)<$maximo);
     }

    /**
     * Post: Devuelve si es valido el email ingresado.
     */
    protected function esCampoDeEmailValido(){
        return filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    }

    /**
     * Post: Obtiene usuario, si no lo encuentra retorna null.
     */
    protected function obtenerUsuarioIngresado(StorageInterface $storage){
        $storage->getSource();
        if ($storage instanceof DatabasesStorage) {
            $sql = 'select * from users where user=:usuario';
            $storage->setQuery($sql);
            $usuarioEncontrado = $storage->select($this->getUsuario()->getUsuario());
        }else{
            $data = file_get_contents('usuarios.json');
            $usuarios = json_decode ($data, true);
            $usuarioEncontrado = null;
            foreach ($usuarios as $usuario) {
                if ($usuario['usuario'] === $this->getUsuario()->getUsuario() && password_verify($this->getUsuario()->getPassword(),$usuario['password'])){
                    $usuarioEncontrado = $usuario;
                }
            }
        }
        return $usuarioEncontrado;
    }

    // Getters & Setters :)

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
