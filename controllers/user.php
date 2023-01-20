<?php
  require_once("./utils/conn.php");
  require_once("./utils/Users.php");

  $User = new User($conn);

  if (isset($_POST["create-user"])) {
    $name = htmlspecialchars($_POST["name"]);
    $username = htmlspecialchars($_POST["username"]);
    $surname = htmlspecialchars($_POST["surname"]);
    $password = htmlspecialchars($_POST["password"]);

    $user = $User->create_user($name, $surname, $username, $password);
    print_r($user);
  }

  if (isset($_POST["login-user"])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $user = $User->login($username, $password);
    print_r($user);
  }
?>