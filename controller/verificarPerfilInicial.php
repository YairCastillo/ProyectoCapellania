<?php
#ESTE ARCHIVO COMPRUEBA QUE EL CAPELLAN HAYA RELLENADO SUS DATOS INICIALES

   $ses_sql = mysqli_query($con,"SELECT usuario from capellanes where usuario = '$user_check' limit 1");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $count = mysqli_num_rows($ses_sql);

   if($count == 0){
        
        header("location:perfilCapellan");
        die();
     }
?>