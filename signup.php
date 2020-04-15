<?php
include("verificarSesionLogin.php");
include("conexion.php");
$error = "";
$strEmail = "@um.edu.mx";

$username = "";
$email = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    //Verificar que ningun campo este vacio
    if(empty(trim($_POST["username"])) or empty(trim($_POST["email"])) or empty(trim($_POST["password"])) or empty(trim($_POST["confirm_password"]))){
        $error = "Por favor, ingresa los datos solicitados";
    }else{
        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $confirm_password = trim($_POST["confirm_password"]);
        $hash = md5(rand(0,1000));
        $verificado = 0;

        //Determinar el tipo de usuario segun su email
        if(strpos($email, $strEmail)){
            $tipoUsuario = "Capellán";
        }else{
            $tipoUsuario = "Alumno";
        }


        $sql = "SELECT nombre FROM usuarios WHERE nombre = '$username'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($result);


        $sql2 = "SELECT email FROM usuarios WHERE email = '$email'";
        $result2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
        
        $count2 = mysqli_num_rows($result2);
            
        //Verificar que el usuario no exista
        if($count == 1) {
            $error = "El nombre de usuario ya existe";
        //Verificar que el correo introducido sea válido
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "El correo electrónico introducido no es válido";

        //Verificar que el usuario sea de al menos 3 caracteres
        }else if($count2 == 1){
            $error = "Ya existe un usuario asociado a este correo electrónico";

        //Verificar que el usuario sea de al menos 3 caracteres
        }else if(strlen($username) <= 3){
            $error = "El nombre del usuario debe contener más de 3 caracteres";

        //Verificar que la contraseña sea de al menos 6 caracteres
        }else if(strlen($password) < 6){
            $error = "La contraseña debe contener al menos 6 caracteres";

        //Verificar que las contraseñas coincidan
        }else if($password != $confirm_password){
            $error = "Las contraseñas no coinciden";
            
            //Verificar que el usuario no sea un correo electronico
        }else if(strpos($username, "@")){
            $error = "El nombre de usuario no puede ser un correo electrónico";
        }
    }

    if($error == ""){
        $username = mysqli_real_escape_string($con, $_REQUEST['username']);
        $email = mysqli_real_escape_string($con, $_REQUEST['email']);
        $password = mysqli_real_escape_string($con, $_REQUEST['password']);

        $hashed_password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

        $sql = "insert into usuarios (nombre, password, tipoUsuario, email, verificado, hash) values('$username', '$hashed_password', '$tipoUsuario', '$email', $verificado, '$hash')";

        if(mysqli_query($con, $sql)){
            session_start();

            $to = $email; // Send email to our user
            $subject = 'Capellanía UM | Verificación'; // Give the email a subject 
            $message = "
            
            Hola, $username.
            Tu cuenta ha sido creada en el sistema de Capellanía de la Universidad de Montemorelos. Confirma tu dirección de correo electrónico para informarnos que eres el propietario de esta cuenta.
            
            Por favor, haz click en el siguiente enlace para verificar tu cuenta:
            http://localhost/proyecto/verificar?hash=$hash"; // Our message above including the link
                                
            $headers = 'From: <pabloyair993@gmail.com>' . "\r\n"; // Set from headers

            mail($to, '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers); // Send our email
            
            
            $_SESSION['login_user'] = $username;
            $_SESSION['redirected_from_signup'] = true;

            header("location: verificarEmail");
        }else{
           $error = "¡Oops! Ocurrió un error. Inténtalo de nuevo más tarde.";
        }
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
<title>Capellanía | Registrarse</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="loadingstyle.css">
<body>
    <div class="signupbox">
    <img src="logo.png" class="avatar">
        <h1>Resgístrate</h1>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        <form autocomplete="off" method="post" id="signup_form">
            <p>Nuevo usuario</p>
            <input type="text" name="username" placeholder="Nombre del usuario" class="form_control" value="<?php echo $username ?>" required>

            <p>Correo electrónico*</p>
            <input type="email" name="email" placeholder="Correo electrónico" value="<?php echo $email ?>" required>

            <p>Contraseña nueva</p>
            <input type="password" name="password" placeholder="Contraseña nueva" required>

            <p>Confirma tu contraseña</p>
            <input type="password" name="confirm_password" placeholder="Confirma tu contraseña" autocomplete="new-password" required>

            <input type="submit" name="" value="Aceptar" onClick="this.form.submit(); this.disabled=true; this.value='Cargando...'; ">

            <a href="login">¿Ya tienes una cuenta? Ingresa aquí</a><br>
            <label>*En caso de que seas capellán, ingresa con tu correo institucional</label>
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