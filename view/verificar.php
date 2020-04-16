<html>
<head>
<script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
    <meta charset="UTF-8">
<title>Capellanía | Verificando</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="loadingstyle.css">
<body>
    <div class="verifybox">
    <img src="logo.png" class="avatar">
        <h1>Cuenta Verificada</h1>
        <form method="post">
             <p>
               <?php

                    include('conexion.php');


                    if(isset($_GET['hash']) && !empty($_GET['hash'])){
                         $hash = mysqli_escape_string($con, $_GET['hash']);

                         $search = mysqli_query($con, "SELECT hash, verificado FROM usuarios WHERE hash = '$hash' and verificado = 0"); 
                         $match  = mysqli_num_rows($search);

                         if($match > 0){
                              mysqli_query($con, "UPDATE usuarios SET verificado='1' WHERE hash = '$hash' and verificado = 0");
                              echo 'Tu cuenta ha sido activada.<br>Ahora puedes iniciar sesión';
                         }else{
                              header("location:login");
                         }
                    }else{
                         header("location:index");
                    }

               ?>
               </p>
            <br>
            <a href="login">Ingresa aquí</a>
            <br>
        </form>
    </div>

    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <script>
        $(window).on("load",function(){
          $(".loader-wrapper").fadeOut("slow");
        });
    </script>
</body>
</head>
</html>