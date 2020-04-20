<?php
#ESTE ARCHIVO MUESTRA UNA ALERTA CUANDO EL ALUMNO AUN NO HAYA RELLENADO LOS DATOS INICIALES
   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($con,"SELECT usuario from alumnos where usuario = '$user_check' limit 1");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $count = mysqli_num_rows($ses_sql);

   if($count == 0){ ?>
   <!DOCTYPE html>
        <html lang="en">
        <head>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
          
          <!-- Modal -->
          <div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
               <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Antes de empezar...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
                    Por favor, completa los siguientes datos.
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick = "$('.modal').hide()">Aceptar</button>
               </div>
               </div>
               </div>
          </div>
          
             


          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script type="text/javascript">
          $(window).on('load',function(){
              $('#myModal').modal('show');
          });
      </script>
        </body>
        </html>
<?php
     }
?>