<?php
#ESTE ARCHIVO MUESTRA UNA ALERTA CUANDO EL ALUMNO AUN NO HAYA RELLENADO LOS DATOS INICIALES
   include('conexion.php');
   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($con,"SELECT usuario from alumnos where usuario = '$user_check' limit 1");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $count = mysqli_num_rows($ses_sql);

   if($count == 0){
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>

        <div class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title">Modal title</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
               <p>Modal body text goes here.</p>
               </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-primary">Save changes</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
          </div>
          </div>
          </div>
        </body>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </html>';
     }
?>