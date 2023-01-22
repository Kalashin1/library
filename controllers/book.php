<?php
require_once('./utils/conn.php');
require_once('./utils/Book.php');

$Book = new Book($conn);

if (isset($_POST["create-book"])) {
  $title = htmlspecialchars($_POST["title"]);
  $page = htmlspecialchars($_POST["page"]);
  $pub_year = htmlspecialchars($_POST["year_of_publication"]);
  $author = htmlspecialchars($_POST["author"]);
  $category = htmlspecialchars($_POST["category"]);
  $image = htmlspecialchars($_POST["image"]);
  $book = $Book->addBook($title, $page, $author, $category, $pub_year, $image);
  echo '<script>(() => {window.location.assign("book.php")})()</script>';
}

if(isset($_POST["update-book"])) {
  $title = htmlspecialchars($_POST["title"]);
  $page = htmlspecialchars($_POST["page"]);
  $pub_year = htmlspecialchars($_POST["year_of_publication"]);
  $image = htmlspecialchars($_POST["image"]);
  $id = htmlspecialchars($_GET["book"]);
  $Book->update_book($id, $title, $page, $pub_year, $image);
  echo '<script>(() => {window.location.assign("book.php")})()</script>';
}

if (isset($_GET["delete_book"])){
  $id = htmlspecialchars($_GET["delete_book"]);
  $Book->delete_book($id);
  echo '<script>(() => {window.location.assign("book.php")})()</script>';
}

?>