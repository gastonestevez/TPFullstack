<?php
class Usuario implements JsonSerializable{

    // Atributos

    private $nombre;
    private $apellido;
    private $usuario;
    private $email;
    private $nacimiento;
    private $password;
    private $provincia;
    private $avatar;
    
    /**
     * Constructor
     * Pre: Se recibe nombre,apellido,usuario,email,nacimiento,pwd,
     * provincia y avatar del usuario
     * Post: Construye un usuario nuevo.
     */
    public function __construct(){
    }

    public function save(StorageInterface $storage){
        $storage->getSource();

        $archivo = $this->getAvatar()['tmp_name'];
        $nombreArchivo =$this->getAvatar()['name'];
        $extension = pathinfo($nombreArchivo,PATHINFO_EXTENSION);
        $miArchivo = 'media/';
        $miArchivo = $miArchivo . md5($nombreArchivo) . '.' . $extension;
        move_uploaded_file($archivo,$miArchivo);
        
        $this->setAvatar($miArchivo);
        $this->setPassword(password_hash($this->getPassword(),PASSWORD_DEFAULT));
  
        if ($storage instanceof DatabasesStorage) {
          $sql = 'INSERT INTO users (nombre, user, apellido, email, nacimiento, pass1, provincia,avatar) 
                VALUES (:nombre, :usuario, :apellido, :email, :nacimiento, :password, :provincia, :avatar)';
          $storage->setQuery($sql);
        }
        $storage->insert([
            'nombre' => $this->getNombre(),
            'apellido' => $this->getApellido(),
            'usuario' => $this->getUsuario(),
            'email' => $this->getEmail(),
            'nacimiento' => $this->getNacimiento(),
            'password' => $this->getPassword(),
            'provincia' => $this->getProvincia(),
            'avatar' => $this->getAvatar(),
        ]);
  
      }
  


    /**
     * Post: Serializa el objeto para guardarlo en JSON.
     */
    public function jsonSerialize(){
        return [
                'nombre' => $this->getNombre(),
                'apellido' => $this->getApellido(),
                'usuario' => $this->getUsuario(),
                'email' => $this->getEmail(),
                'nacimiento' => $this->getNacimiento(),
                'password' => $this->getPassword(),
                'provincia' => $this->getProvincia(),
                'avatar' => $this->getAvatar(),
        ];
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

    /**
     * Get the value of provincia
     */ 
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set the value of provincia
     *
     * @return  self
     */ 
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }
}
