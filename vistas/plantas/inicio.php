<style>
    #customers-caja {
        background: #fff;
        overflow: hidden;
        padding: 25px;
        width: 100%;
        box-shadow: 0px 12px 22px -16px rgba(0, 0, 0, 0.8);
    }

    #customers-caja p {
        margin: 12px 0px;
        font-size: 20px;
    }

    .botones {
        overflow: hidden;
        width: 60%;
        margin: auto;
    }

    .editar {
        display: block;
        float: left;
        padding: 12px;
        background: #94B3FD;
        text-decoration: none;
        color: white;
        border-radius: 5px;
    }

    .borrar {
        display: block;
        float: right;
        padding: 12px;
        background: #EC255A;
        text-decoration: none;
        color: white;
        border-radius: 5px;
    }

    .btn-agregar {
        display: block;
        width: 15%;
        float: right;
        padding: 12px;
        background: #7267CB;
        text-decoration: none;
        color: white;
        text-align: center;
        border-radius: 5px;
        margin-top: 20px;
    }
</style>


<div id="customers-caja">

    <p>Lista de Empleados</p>
    <table id="customers">
        <thead>
            <tr>
                <th>ID</th>
                <th>Direccion</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Latitud</th>
                <th>Longitud</th>
            </tr>
        </thead>
        <tbody>
           
            <?php foreach ($plantas as $planta) { ?>
                <tr>
                    <td><?php echo $planta->id_planta; ?></td>
                    <td><?php echo $planta->direccion; ?></td>
                    <td><?php echo $planta->descripcion; ?></td>
                    <td><?php echo $planta->imagen; ?></td>
                    <td><?php echo $planta->lat; ?></td>
                    <td><?php echo $planta->lng; ?></td>
                    <td>
                        <div class="botones">
                            <a href="?controlador=plantas&accion=editar&id=<?php echo $planta->id_planta; ?>" class="editar">Editar</a>
                            <a href="?controlador=plantas&accion=borrar&id=<?php echo $planta->id_planta; ?>" class="borrar">Borrar</a>
                        </div>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a class="btn-agregar" href="?controlador=plantas&accion=crear">Agregar empleado</a>
</div>