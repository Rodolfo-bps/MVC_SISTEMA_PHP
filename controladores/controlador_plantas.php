<?php

include_once("modelos/plantas.php");
include_once("conexion.php");

/*preparar controlador crud */

class ControladorPlantas
{
    public function inicio()
    {
        $plantas = Planta::consultar();
        include_once("vistas/plantas/inicio.php");
    }

    public function crear()
    {
        if ($_POST) {
            print_r($_POST);
            $direccion = $_POST['direccion'];
            $descripcion = $_POST['descripcion'];
            $imagen = $_POST['imagen']['name'];
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];
            Planta::crear($direccion, $descripcion, $imagen, $lat, $lng);
            header("location: ./?controlador=plantas&accion=inicio");
        }
        include_once("vistas/plantas/crear.php");
    }

    public function editar()
    {
        
        if ($_POST) {
            $id_planta = $_POST['id_planta'];
            $direccion = $_POST['direccion'];
            $descripcion = $_POST['descripcion'];
            $imagen = $_POST['imagen'];
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];
            Planta::editar($id_planta, $direccion, $descripcion, $imagen, $lat, $lng);            
            header("location: ./?controlador=plantas&accion=inicio"); 
        }

        $id_planta = $_GET['id_planta'];
        $planta = (Planta::buscar($id_planta));

        
        
        include_once("vistas/plantas/editar.php");
    }

    public function borrar()
    {
        print_r($_GET);
        $id_planta = $_GET['id_planta'];
        Planta::borrar($id_planta);
        header("location: ./?controlador=plantas&accion=inicio");
    }
}
