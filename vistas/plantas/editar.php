<form action="" method="post" class="form-crear">
    <p>Editar plantas</p>

    <input type="text" value="<?php echo $planta->id_planta; ?>" name="id" id="id" placeholder="ID" readonly>
    <input required type="text" value="<?php echo $planta->direccion; ?>" name="direccion" placeholder="direccion">
    <input required type="text" value="<?php echo $planta->descripcion; ?>" name="descripcion" placeholder="descripcion">
    <input type="file" value="<?php echo $planta->imagen; ?>" name="imagen">
    <input required type="text" value="<?php echo $planta->lat; ?>"  name="lat" placeholder="latitud">
    <input required type="text" value="<?php echo $planta->lng; ?>" name="lng" placeholder="Longitud">
  
    <a href="?controlador=plantas&accion=inicio">Cancelar</a>
    <input  type="submit" value="Modificar">
</form>