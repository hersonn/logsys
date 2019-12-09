<?php  
    session_start();

    unset($_SESSION['login']);
    unset($_SESSION['permission']);

    echo("Logout efetuado!<br><br><a href='login.html'>Login</a>");

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
