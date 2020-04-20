<html>
<head>
<script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
    <meta charset="UTF-8">
<title>CapellaníaUM | Verificando</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/loadingstyle.css">
<body>
    <div class="verifybox">
    <img src="../assets/logo.png" class="avatar">
        <h1>Cuenta Verificada</h1>
        <form method="post">
             <p>
               <?php
                    include('../model/verificarModel.php');
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