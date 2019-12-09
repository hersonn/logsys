<?php

require 'connect.php';

$user = $_POST['user'];
$pw = $_POST['password'];
$permission = $_POST['permission'];


// Set User as Admin or Common user
if ($permission == "Administrador") {
  $perm = 1;
} else {
  $perm = 0;
}

// Check User Input
$valid_input = True;
if (!preg_match('/^([a-zA-Z0-9_-]{3,16})$/', $user)) {
  echo "<b>Usuário inválido</b>, só pode conter números, letras e os caracteres especiais: @ # $ % & _ -";
  echo "<br/>Mínimo 3 e no máximo 16 caracteres!<br/>";
  $valid_input = False;
}

// Check Password Input
if (!preg_match('/^([a-zA-Z0-9@#$%&_-]{6,18})$/', $pw)) {
  echo "<b>Senha inválida</b>, só pode conter números, letras e os caracteres especiais: _ -";
  echo "<br/>Mínimo 6 e no máximo 18 caracteres!<br/>";
  $valid_input = False;
}

// Proceed if both are Valid
if ($valid_input == True) {

  $pw = password_hash($pw, PASSWORD_DEFAULT);

  $sql = "INSERT INTO usuarios (user, password, administrator) VALUES (?, ?, ?)";

  // Prepare and Bind
  if (!$stmt = $conn->prepare($sql)) {
    die("Prepare Error: " . $conn->error);
  }

  $stmt->bind_param("ssi", $user, $pw, $perm);

  // Execute the Query
  if ($stmt->execute() === TRUE) {
    echo "New record successfully created!";
    echo "<br><a href='login.html'>Login</a>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br><a href='cadastro.html'>Retornar para Cadastro.</a>";
  }

  $stmt->close();
  $conn->close();

} else {
  echo "<br><a href='cadastro.html'>Cadastro</a>";
  exit;
}

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">