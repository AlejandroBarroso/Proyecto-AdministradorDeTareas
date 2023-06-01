<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController {
    public static function login(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
        // Render a la vista
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesion'
        ]);
    }

    public static function logout() {
        echo 'desde Logout';
    }

    public static function crear(Router $router) {
        $alertas = [];
        $usuario = new Usuario;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta(); 
            if(empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);
                if($existeUsuario) {
                  Usuario::setAlerta('error', 'El usuario ya esta registrdo');
                  $alertas = Usuario::getAlertas();
                } else {
                    // Hash al password
                    $usuario->hashPassword();
                    // Eliminar password2
                    unset($usuario->password2);
                    // Generar token
                    $usuario->crearToken();
                    // crear un nuevo usuario
                    $resulatdo = $usuario->guardar();
                    if($resulatdo) {
                        header('Location: /mensaje');
                    }
                }
            }
        }
         // Render a la vista
         $router->render('auth/crear', [
            'titulo' => 'Crea tu cuenta en UpTask',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function olvide(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
             // Render a la vista
            $router->render('auth/olvide', [
                'titulo' => 'Olvidaste tu Password'
            ]);
    }

    public static function reestablecer(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }
         // Render a la vista
        $router->render('auth/reestablecer', [
             'titulo' => 'Reestablecer tu Password'
        ]);
    }

    public static function mensaje(Router $router) {
              
        // Render a la vista
        $router->render('auth/mensaje', [
            'titulo' => 'Cuenta creada correctamente'
        ]);
    }

    public static function confirmar(Router $router) {
        // Render a la vista
        $router->render('auth/confirmar', [
            'titulo' => 'Confirma tu cuenta UpTask'
        ]);
    }
}