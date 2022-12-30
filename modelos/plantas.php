<?php

class Planta
{

    public $id_planta;
    public $direccion;
    public $descripcion;
    public $imagen;
    public $lat;
    public $lng;


    public function __construct($id_planta, $direccion, $descripcion, $imagen, $lat, $lng)
    {
        $this->id_planta = $id_planta;
        $this->direccion = $direccion;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public static function consultar()
    {
        $listaPlantas = [];

        $conexionBD = BD::crearInstancia();
        $sql = $conexionBD->query("SELECT * FROM mapa");

        foreach ($sql->fetchAll() as $planta) {
            $listaPlantas[] = new Planta($planta['id_planta'], $planta['direccion'], $planta['descripcion'], $planta['imagen'], $planta['lat'], $planta['lng']);
        }

        return $listaPlantas;
    }

    public static function crear($direccion, $descripcion, $imagen, $lat, $lng)
    {
        //no se repita la imagen
        $fecha = new DateTime();
        $imagen = $fecha->getTimestamp() . "_" . $_FILES['imagen']['name']; //para que no se repita
        //tratar imagen
        $imagen_temporal = $_FILES['imagen']['tmp_name'];
        move_uploaded_file($imagen_temporal, "vistas/imagenes/" . $imagen);


        $conexionBD = BD::crearInstancia();

        $sql = $conexionBD->prepare("INSERT INTO mapa (direccion, descripcion, imagen, lat, lng)  VALUE (?,?,?,?,?)");
        $sql->execute(array($direccion, $descripcion, $imagen, $lat, $lng));
    }

    public static function borrar($id_planta)
    {
        $conexionBD = BD::crearInstancia();

        //borrar imagen
        $imagen = $conexionBD->prepare("SELECT imagen FROM `mapa` WHERE id_planta = " . $id_planta);;
        unlink("../vistas/imagenes/" . $imagen[0]['imagen']);



        $sql = $conexionBD->prepare("DELETE FROM mapa WHERE id_planta=?");
        $sql->execute(array($id_planta));


    }

    public static function buscar($id_planta)
    {
        $conexionBD = BD::crearInstancia();

        $sql = $conexionBD->prepare("SELECT * FROM mapa WHERE id_planta=?");
        $sql->execute(array($id_planta));
        $planta = $sql->fetch();
        return new Planta($planta['id_planta'], $planta['descripcion'], $planta['direccion'], $planta['imagen'], $planta['lat'], $planta['lng']);
    }

    public static function editar($id_planta, $direccion, $descripcion, $imagen, $lat, $lng)
    {
        $conexionBD = BD::crearInstancia();
        $sql = $conexionBD->prepare("UPDATE mapa SET direaccion=?, descripcion=?, imagen=?, lat=?, lng=? WHERE id_planta=?");
        $sql->execute(array($direccion, $descripcion, $imagen, $lat, $lng, $id_planta));
    }
}
