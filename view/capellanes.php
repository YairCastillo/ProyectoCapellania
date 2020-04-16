
<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
    <script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <title>CapellaníaUM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" type="text/css" href="loadingstyle.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        

    </head>
    <body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>    
            <label class="logo">CapellaníaUM</label>
            <ul>
                <li><a class="active" href="#">Inicio</a></li>
                <li><a href="#">Alumnos</a></li>
                <li><a href="calendar">Agenda</a></li>
                <li><a href="#">Acerca de</a></li>
                </div>
            </ul>
        </nav>
        <section></section>
        <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <script>
        $(window).on("load",function(){
          $(".loader-wrapper").fadeOut("slow");
        });
    </script>
    </body>
</html>