<?php
require_once("./utils/conn.php");
require_once("./utils/authors.php");

$Author = new Author($conn);

if (isset($_POST["create-author"])) {
  $name = htmlspecialchars($_POST["name"]);
  $surname = htmlspecialchars($_POST["surname"]);
  $bio = htmlspecialchars($_POST["bio"]);
  $author = $Author->create_author($name, $surname, $bio);
  print_r($author);
}

if (isset($_POST["update-author"])) {
  $name = htmlspecialchars($_POST["name"]);
  $surname = htmlspecialchars($_POST["surname"]);
  $bio = htmlspecialchars($_POST["bio"]);
  $author = $Author->update_author($name, $surname, $bio, "192389517663c8315390a8c7.71245432");
  print_r($author);
}

// print_r($Author->get_author("192389517663c8315390a8c7.71245432"));
// print_r(count($Author->get_authors()));
// print_r(count($Author->undo_delete("192389517663c8315390a8c7.71245432")));

?>