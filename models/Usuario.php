<?php
namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'token', 'confirmado'];

    public $id;
    public $nombre;    
    public $email;    
    public $password;    
    public $password2;    
    public $token;    
    public $confirmado;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? '';
    }

    public function validarNuevaCuenta() {
        if(!$this->nombre) {
            self::$alertas['error'] [] = 'El nombre es obligatorio';
        }
        if(!$this->email) {
            self::$alertas['error'] [] = 'El email es obligatorio';
        }
        if(!$this->password) {
            self::$alertas['error'] [] = 'El password es obligatorio';
        }
        if(strlen(!$this->password) < 6) {
            self::$alertas['error'] [] = 'El password debe contener al menos 6 caractateres';
        }
        if(!$this->password !== $this->password2) {
            self::$alertas['error'] [] = 'Los passwords son diferentes';
        }
       

        return self::$alertas;
    }
}