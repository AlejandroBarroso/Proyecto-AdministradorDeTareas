<?php

namespace Controllers;

use Model\Proyecto;
use MVC\Router;


class DashboardController {

    public static function index(Router $router) {
        session_start();
        isAuth();

        $router->render('dashboard/index', [
            'titulo' => 'Proyectos'

        ]);
    }

    public static function crear_proyecto(Router $router) {
        session_start();
        isAuth();
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proyecto = new Proyecto($_POST);

            // Validar
            $alertas = $proyecto->validarProyecto();

            if(empty($alertas)) {

                // Generar una url unica
                $hash = md5(uniqid());
                $proyecto->url = $hash;

                // Almacenar el creador del proyecto
                $proyecto->propietarioId = $_SESSION['id'];

                // Guardar el proyecto
                $proyecto->guardar();

                // Redirecciionar
                header('Location: /proyecto?id=' . $proyecto->url);

            }

        }


        $router->render('dashboard/crear-proyecto', [
            'alertas' => $alertas,
            'titulo' => 'Crear Proyecto'

        ]);
    }

    public static function perfil(Router $router) {
        session_start();

        $router->render('dashboard/perfil', [
            'titulo' => 'Perfil'

        ]);
    }
}