<?php
                    include('conexion.php');


                    if(isset($_GET['hash']) && !empty($_GET['hash'])){
                         $hash = mysqli_escape_string($con, $_GET['hash']);

                         $search = mysqli_query($con, "SELECT hash, verificado FROM usuarios WHERE hash = '$hash' and verificado = 0"); 
                         $match  = mysqli_num_rows($search);

                         if($match == 1){
                              mysqli_query($con, "UPDATE usuarios SET verificado='1' WHERE hash = '$hash' and verificado = 0");
                              echo 'Tu cuenta ha sido activada.<br>Ahora puedes iniciar sesión';
                         }else{
                              header("location:login");
                         }
                    }else{
                         header("location:login");
                    }
?>