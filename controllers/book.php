<?php
require_once('./utils/conn.php');
require_once('./utils/Book.php');

$Book = new Book($conn);

function create_book($Book){
  if (isset($_POST["create-book"])) {
    $title = htmlspecialchars($_POST["title"]);
    $page = htmlspecialchars($_POST["page"]);
    $pub_year = htmlspecialchars($_POST["year_of_publication"]);
    $author = htmlspecialchars($_POST["author"]);
    $category = htmlspecialchars($_POST["category"]);
    $image = htmlspecialchars($_POST["image"]);
    $book = $Book->addBook($title, $page, $author, $category, $pub_year, $image);
    print_r($book);
  }
}

function get_books($Book) {
  echo count($Book->get_books());
}

function get_book($Book, $id){
  $book = $Book->get_book(htmlspecialchars($id));
  print_r($book);
}

// create_book($Book);
// get_books($Book);
// get_book($Book, "163828045463c859d12f5dd6.18705545");
?>
