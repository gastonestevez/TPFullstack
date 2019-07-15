<?php

require 'Validacion.php';

 class ValidacionRegistro extends Validacion{
   private $pass2;
   private $aceptaTerminos;

  public function validarRegistro(){

    if(null ==($this->getUsuario()->getNombre())){
          $this->addError('nombre','Falta el campo nombre');
        }else if(empty($this->getUsuario()->getNombre())){
          $this->addError('nombre','El nombre es requerido');
        }

    if(null == ($this->getUsuario()->getUsuario())){
      $this->addError('usuario','Falta el campo usuario');
    }else if(empty($this->getUsuario()->getUsuario())){
      $this->addError('usuario','El usuario es requerido');
    }else if(!$this->validaAncho(5,12,$this->getUsuario()->getPassword())){
      $this->addError('usuario','Elige un nombre de usuario que tenga entre 6 y 12 caracteres');
    }

    if(null == ($this->getUsuario()->getApellido())){
      $this->addError('apellido','Falta el campo apellido');
    }else if(empty($this->getUsuario()->getApellido())){
      $this->addError('apellido','El apellido es requerido');
    }

    if(null == ($this->getUsuario()->getEmail())){
      $this->addError('email','Falta el campo email');
    }else if(empty($this->getUsuario()->getemail())){
      $this->addError('email','El email es requerido.');
    }else if(!$this->esCampoDeEmailValido()){
      $this->addError('email','El email no es valido');
    }


    if(null == ($this->getUsuario()->getNacimiento())){
      $this->addError('fechanacimiento','Falta el campo fecha');
    }else if(empty($this->getUsuario()->getNacimiento())){
      $this->addError('fechanacimiento','Ingrese una fecha');
    }

    if(null == ($this->getUsuario()->getProvincia() || 'seleccion' == $this->getUsuario()->getProvincia())){
        $this->addError('provincia','Debes seleccionar una provincia');
    }

    if(null == ($this->getPass2())){
      $this->addError('password','Falta el campo contraseña');
    }else if($this->getUsuario()->getPassword() != $this->getPass2()){
      $this->addError('password','Las contraseñas no coinciden');
    }else if(!$this->validaAncho(5,13,$this->getPass2())){
      $this->addError('password', 'La password debe tener entre 6 y 12 caracteres');
    }

    if(null == ($this->getUsuario()->getAvatar())){
      $this->addError('avatar','Debe cargar un avatar');
    } 
    
    if(empty($this->getUsuario()->getNacimiento())){
      $this->addError('avatar','El avatar es requerido');
    }

    if(null == ($this->getAceptaTerminos())){
      $this->addError('terminos','Debe aceptar los terminos y condiciones para poder continuar');
    }

    return empty($this->getErrors());

    }



   /**
    * Get the value of pass2
    */ 
   public function getPass2()
   {
      return $this->pass2;
   }

   /**
    * Set the value of pass2
    *
    * @return  self
    */ 
   public function setPass2($pass2)
   {
      $this->pass2 = $pass2;

      return $this;
   }

   /**
    * Get the value of aceptaTerminos
    */ 
   public function getAceptaTerminos()
   {
      return $this->aceptaTerminos;
   }

   /**
    * Set the value of aceptaTerminos
    *
    * @return  self
    */ 
   public function setAceptaTerminos($aceptaTerminos)
   {
      $this->aceptaTerminos = $aceptaTerminos;

      return $this;
   }
      }
