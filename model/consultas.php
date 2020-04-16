<?php
     header('Content-Type: application/json');
     require("conexion.php");
     $conexion = conectarBD();
     //datos provenientes del formulario de alta de alumnos
    
     /*$matricula = $_POST['matricula'];
     $nombre = $_POST['nombre'];
     $fechanacimiento = $_POST['fechanacimiento'];
     $edad = $_POST['edad'];
    */
     // $matricula = '0920975';
     // $nombre = 'Enoc Cruz Nájera';
     // $fechanacimiento = '1973/06/09';
     // $edad = 46;
     switch ($_GET['accion']) {
        case 'mostrar_listado':
               $qry = "select matricula,nombre,fechanacimiento, edad from alumno";
               $result = mysqli_query($conexion, $qry);
               $resultado = mysqli_fetch_all($result, MYSQLI_ASSOC);// or die(mysqli_error());
               echo json_encode($resultado);
               mysqli_close($conexion);
             break;
        case 'agregar':
                $qry = "insert into alumno values('$_POST[matricula]','$_POST[nombre]','$_POST[fechanacimiento]', $_POST[edad])";
                $respuesta = mysqli_query($conexion, $qry);// or die(mysqli_error());
                echo json_encode($respuesta);
                mysqli_close($conexion);                          
                break;

          case 'borrar':
               $qry = "delete from alumno where matricula='$_GET[matricula]'";
               $respuesta = mysqli_query($conexion, $qry);// or die(mysqli_error());
             
               echo json_encode($respuesta);
               mysqli_close($conexion);
             break;
          case 'consultar':
               $qry = "select matricula, nombre, fechanacimiento, edad from alumno where matricula='$_GET[matricula]'";
               $datos = mysqli_query($conexion, $qry);// or die(mysqli_error());
               $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
               echo json_encode($resultado);
               mysqli_close($conexion);
             break;
            
          case 'modificar':
               $qry = "update alumno set nombre='$_POST[nombre]',
                       fechanacimiento='$_POST[fechanacimiento]',
                       edad=$_POST[edad]
                       where matricula='$_GET[matricula]'";    
               /*"update alumno set nombre='Enoc Cruz Nájera',
                       fechanacimiento='1974/06/09',
                       edad=45
                       where matricula='0920975'";*/
                  
               $respuesta = mysqli_query($conexion, $qry);// or die(mysqli_error());
               echo json_encode($respuesta);
               mysqli_close($conexion);
             break;
        
        
     }
?>