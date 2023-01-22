<?php
  require_once("./utils/conn.php");
  require_once("./utils/Users.php");

  $conn = connect();

  $User = new User($conn);
  $error = ["username" => "", "password"];

  if (isset($_POST["login"])) {
    $error["username"] = "";
    $error["password"] = "";
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $user = $User->login($username, $password);
    if (!isset($user["error"])){
      session_start();
      $_SESSION["user"] = $user;
      header("Location: index.php");
      exit();
    } else {
      if ($user["error"] == "no user with that username"){
        $error["username"] = $user["error"];
      } elseif ($user["error"] == "incorrect Password") {
        $error["password"] = $user["error"];
      }
    }
  }

  if (isset($_POST["create-user"])) {
    $error["username"] = "";
    $name = htmlspecialchars($_POST["name"]);
    $username = htmlspecialchars($_POST["username"]);
    $surname = htmlspecialchars($_POST["surname"]);
    $password = htmlspecialchars($_POST["password"]);
    $user = $User->create_user($name, $surname, $username, $password);
    if (!isset($user["error"])){
      session_reset();
      $_SESSION["user"] = $user;
      echo '<script>(() => {window.location.assign("book.php")})()</script>';
    } else {
      print_r($user["error"]);
      $error["username"] = $user["error"];
    }
  }
?>