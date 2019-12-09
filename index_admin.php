<html>
<meta  charset="utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<table align="center" style="text-align: center; " border='2'>
  <tr>
    <th>ID</th>
    <th>Admin</th>
    <th>Nome</th>
    <th>Senha</th>
  </tr>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <?php
  session_start();

  if (isset($_SESSION["user"])) {

    $login_session = $_SESSION['user'];
    $permission = $_SESSION['permission'];

    if ($permission == 1) {
      echo "Bem-Vindo Administrador, $login_session <br>";
      echo "Essas informações <font color='red'>PODEM</font> ser acessadas por você!<br><br>";

      require 'connect.php';

      $sql = "SELECT * FROM usuarios";
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      $result = $stmt->get_result();
      while ($row = $result->fetch_row()) {
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "Bem-Vindo, $login_session <br>";
      echo "Você NÃO é administrador, portanto NÃO É BEM VINDO AQUI!<br>";
      echo "Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
    }

    echo "<br><a href='logout.php'>Logout</a>";
  } else {
    echo "Bem-Vindo, convidado <br>";
    echo "Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
    echo "<br><a href='login.html'>Faça Login</a> Para ler o conteúdo";
  }
  ?>

