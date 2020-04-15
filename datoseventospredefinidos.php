<?php
header('Content-Type: application/json');

require("conexion.php");


switch ($_GET['accion']) {
    case 'listar':
        $datos = mysqli_query($con, "select id_evento,titulo,horainicio,horafin,colortexto,colorfondo from eventospredefinidosusuarios");
        $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;

    case 'agregar':
        $respuesta = mysqli_query($con, "insert into eventospredefinidosusuarios(titulo,horainicio,horafin,colortexto,colorfondo) values 
                                                ('$_POST[titulo]','$_POST[horainicio]','$_POST[horafin]','$_POST[colortexto]','$_POST[colorfondo]')");
        echo json_encode($respuesta);
        break;

    case 'borrar':
        $respuesta = mysqli_query($con, "delete from eventospredefinidosusuarios where id_evento=$_POST[id_evento]");
        echo json_encode($respuesta);
        break;
}
