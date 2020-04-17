<?php
  if($verificado != 1){
    if($token != null || $expDate != null){
      $sql = "UPDATE usuarios SET token=null, expDate=null WHERE nombre =$nombre";
      mysqli_query($con, $sql);
    }
    $_SESSION['redirected_to_verificarEmail'] = true;
    header("location:verificarEmail");
    die();
  }
?>