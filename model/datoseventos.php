<?php
header('Content-Type: application/json');

include("../controller/conexion.php");

include('../controller/verificarSesion.php');

$conexion = $con;
$usuario = $nombre;
$sql = "SELECT tipoUsuario from usuarios where nombre = '$nombre'";
            $result = mysqli_query($conexion,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            $tipoUsuario = $row['tipoUsuario'];

            if($tipoUsuario == 'Capellán'){
               $sql2 = "SELECT idFacultad from capellanes where usuario = '$nombre'";
            }else if($tipoUsuario == 'Alumno'){
                $sql2 = "SELECT datosacademicos.idFacultad from datosacademicos
                INNER JOIN alumnos ON datosacademicos.matricula = alumnos.matricula
                and alumnos.usuario = '$nombre'";
            }

            $result2 = mysqli_query($conexion,$sql2);
            $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

            $idFacultad = $row2['idFacultad'];

switch ($_GET['accion']) {
        case 'listar':
            $datos = mysqli_query($conexion, "SELECT id_evento as id,
                                                    usuario = '$usuario',
                                                     titulo as title,
                                                     descripcion,
                                                     inicio as start,
                                                     fin as end,
                                                     colortexto as textColor,
                                                     colorfondo as backgroundColor 
                                                from eventos where idFacultad = '$idFacultad'");
            $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
            echo json_encode($resultado);
            break;
    
        case 'agregar':            
            $respuesta = mysqli_query($conexion, "INSERT into eventos(idFacultad,usuario,titulo,descripcion,inicio,fin,colortexto,colorfondo) values 
                                                    ('$idFacultad','$usuario','$_POST[titulo]','$_POST[descripcion]','$_POST[inicio]','$_POST[fin]','$_POST[colortexto]','$_POST[colorfondo]')");
            echo json_encode($respuesta);
            
            break;

        case 'modificar':
            $respuesta = mysqli_query($conexion, "update eventos set titulo='$_POST[titulo]',
                                                                     descripcion='$_POST[descripcion]',
                                                                     inicio='$_POST[inicio]',
                                                                     fin='$_POST[fin]',
                                                                     colortexto='$_POST[colortexto]',
                                                                     colorfondo='$_POST[colorfondo]'
                                                                where id_evento=$_POST[id_evento]");
            echo json_encode($respuesta);
            break;
    
        case 'borrar':
            $respuesta = mysqli_query($conexion, "delete from eventos where id_evento=$_POST[id_evento]");
            echo json_encode($respuesta);
            break;
    }
