<?php

require 'connect.php';

$login = $_POST['login'];
$user = $_POST['user'];
$pw = $_POST['password'];

if (isset($login)) {

  // Check User Input
  $valid_input = True;
  if (!preg_match('/^([a-zA-Z0-9_-]{0,16})$/', $user)) {
    $valid_input = False;
  }
  // Check Password Input
  if (!preg_match('/^([a-zA-Z0-9@#$%&_-]{6,16})$/', $pw)) {
    $valid_input = False;
  }

  // Proceed if both are Valid
  if ($valid_input == True) {
    $sql = "SELECT * FROM usuarios WHERE user = ?";

    // Prepare and Bind
    if (!$stmt = $conn->prepare($sql)) {
      die("Prepare Error: " . $conn->error);
    }

    $stmt->bind_param("s", $user);

    $stmt->execute();
    $result = $stmt->get_result();

    // Execute the Query
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

        $pw_hash = $row["password"];

        if (password_verify($pw, $pw_hash)) {

          session_start();

          // Administrator
          if ($row["administrator"] == 1) {
            // Setting Session
            $_SESSION["user"] = $user;
            $_SESSION["permission"] = 1;

            header("Location:index_admin.php");
          }

          // Common User
          else {
            // Setting Session
            $_SESSION["user"] = $user;
            $_SESSION["permission"] = 0;

            header("Location:index.php");
          }
        }
      }
    } else {
      echo "<script language='javascript' type='text/javascript'>
          alert('Login e/ou senha incorretos');window.location
          .href='login.html';</script>";
      die();
    }
    $stmt->close();
    $conn->close();
  }
}
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">