<?php
  session_start();

  if(isset($_SESSION["user"])){

    $login_session = $_SESSION["user"];

    echo"Bem-Vindo, $login_session <br>";
    echo"Essas informações <font color='red'>PODEM</font> ser acessadas por você!";

    echo "<br><br><a href='logout.php'>Logout</a>"; 
  
  }else{

    echo"Bem-Vindo, convidado <br>";
    echo"Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
    echo"<br><a href='login.html'>Faça Login</a> Para ler o conteúdo";

  }
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
