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
    public $password_actual;
    public $password_nuevo;
    public $repetir_password_nuevo; 
    public $token;    
    public $confirmado;


    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->password_actual = $args['password_actual'] ?? '';
        $this->password_nuevo = $args['password_nuevo'] ?? '';
        $this->repetir_password_nuevo = $args['repetir_password_nuevo'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
    }

    // Validar el login de usuarios
    public function validarLogin() {
        if(!$this->email) {
            self::$alertas['error'] [] = 'El email es obligatorio';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'] [] = 'Email no válido';
        }
        if(!$this->password) {
            self::$alertas['error'] [] = 'El password es obligatorio';
        }
        return self::$alertas;
    }

    // Validacion para cuentas nuevas
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
        if(strlen($this->password) < 6) {
            self::$alertas['error'] [] = 'El password debe contener al menos 6 caractateres';
        }
        if($this->password !== $this->password2) {
            self::$alertas['error'] [] = 'Los passwords son diferentes';
        }
        return self::$alertas;
    }

    // Valida un email
    public function ValidarEmail() {
        if(!$this->email) {
            self::$alertas['error'] [] = 'El Email es obligatorio';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'] [] = 'Email no válido';
        }
        return self::$alertas;
    }

    // Validar el password
    public function validarPassword() {
        if(!$this->password) {
            self::$alertas['error'] [] = 'El password es obligatorio';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['error'] [] = 'El password debe contener al menos 6 caractateres';
        }
        if($this->password !== $this->password2) {
            self::$alertas['error'] [] = 'Los passwords son diferentes';
        }
        return self::$alertas;
    }

    public function validar_perfil() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        return self::$alertas;
    }

    public function nuevo_password() : array {
        if(!$this->password_actual) {
            self::$alertas['error'][] = 'El Password Actual Es Obligatorio';
        }
        if(!$this->password_nuevo) {
            self::$alertas['error'][] = 'El Password Nuevo Es Obligatorio';
        }
        if(strlen($this->password_nuevo) < 6) {
            self::$alertas['error'][] = 'El Password Nuevo debe Tener Minimo 6 Caracteres';
        }
        return self::$alertas;
    }

               
    public function comprobarPassword() : bool {
        return password_verify($this->password_actual, $this->password);
    }

    // hashea el password
    public function hashPassword() : void {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Genera token
    public function crearToken() : void {
        $this->token = uniqid();
    }
}