<?php
require_once("./utils/conn.php");
require_once("./utils/authors.php");

$Author = new Author($conn);

if (isset($_POST["create-author"])) {
  $name = htmlspecialchars($_POST["name"]);
  $surname = htmlspecialchars($_POST["surname"]);
  $bio = htmlspecialchars($_POST["bio"]);
  $author = $Author->create_author($name, $surname, $bio);
  echo '<script>(() => {window.location.assign("author.php")})()</script>';
}

if (isset($_POST["update-author"])) {
  $name = htmlspecialchars($_POST["name"]);
  $surname = htmlspecialchars($_POST["surname"]);
  $bio = htmlspecialchars($_POST["bio"]);
  $id = htmlspecialchars($_GET["author"]);
  $author = $Author->update_author($name, $surname, $bio, $id);
  echo '<script>(() => {window.location.assign("author.php")})()</script>';
}

if (isset($_GET["delete_author"])) {
  $id = htmlspecialchars($_GET["delete_author"]);
  $Author->delete_author($id);
  echo '<script>(() => {window.location.assign("author.php")})()</script>';
}



?>