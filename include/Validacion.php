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
}
?>