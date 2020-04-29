<?php
header('Content-Type: application/json');

include("../controller/conexion.php");

include('../controller/verificarSesion.php');

$conexion = $con;

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
            

$sql3= "SELECT usuario FROM eventos where usuario= '$usuario'";
            $result3 = mysqli_query($conexion, $sql3);            
            $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
            $value = $row3['usuario'];

switch ($_GET['accion']) {
        case 'listar':
            $datos = mysqli_query($conexion, "SELECT id_evento as id,
                                                    usuario = '$nombre',
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
                                                    ('$idFacultad','$nombre','$_POST[titulo]','$_POST[descripcion]','$_POST[inicio]','$_POST[fin]','$_POST[colortexto]','$_POST[colorfondo]')");
            echo json_encode($respuesta);
            break;

        case 'modificar':            
            echo $value == $nombre;
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
            echo $value == $nombre;
            $respuesta = mysqli_query($conexion, "delete from eventos where id_evento=$_POST[id_evento]");
            echo json_encode($respuesta);
            break;
    }
