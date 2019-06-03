<?php
class Usuario{

    // Atributos

    private $nombre;
    private $apellido;
    private $usuario;
    private $email;
    private $nacimiento;
    private $password;
    private $avatar;
    
    /**
     * Constructor
     * Pre: Se recibe nombre,apellido,usuario,email,nacimiento,pwd,
     * provincia y avatar del usuario
     * Post: Construye un usuario nuevo.
     */
    public function __constructor($nombre,$apellido,$usuario,$email,$nacimiento,$password,$avatar){
        setNombre($nombre);
        setApellido($apellido);
        setUsuario($usuario);
        setEmail($email);
        setNacimiento($nacimiento);
        setPassword($password);
        setAvatar($avatar);
    }
    
    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of nacimiento
     */ 
    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
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

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set the value of nacimiento
     *
     * @return  self
     */ 
    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;

        return $this;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }
}
