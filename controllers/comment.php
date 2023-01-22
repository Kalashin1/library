<?php 
  require_once("./utils/conn.php");
  require_once("./utils/Comment.php");

  $conn = connect();
  $Comment = new Comment($conn);

  if(isset($_POST["add-comment"]) && isset($_SESSION["user"])) {
    $content = htmlspecialchars($_POST["content"]);
    $book = htmlspecialchars($_GET["book"]);
    $user = $_SESSION["user"]["id"];
    $comment = $Comment->insert_comment($content, $user, $book);
  } 

  if (isset($_GET["approve_comment"])){
    $id = htmlspecialchars($_GET["approve_comment"]);
    $comment = $Comment->get_comment($id);
    $Comment->approve_comment($id);
    echo "<script>(() => {window.location.assign('book-view.php?book=$comment[book_id]')})()</script>";
  }

  if (isset($_GET["delete_comment"]) && isset($_SESSION["user"])) {
    $id = htmlspecialchars($_GET["delete_comment"]);
    $comment = $Comment->get_comment($id);
    $Comment->delete_comment($id, $_SESSION["user"]["id"]);
    echo "<script>(() => {window.location.assign('book-view.php?book=$comment[book_id]')})()</script>";
  }
?>