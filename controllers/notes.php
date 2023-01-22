<?php 
  require_once("./utils/conn.php");
  require_once("./utils/Notes.php");

  $conn = connect();
  $Note = new Note($conn);

  if(isset($_POST["add-note"]) && isset($_SESSION["user"])) {
    $content = htmlspecialchars($_POST["content"]);
    $book = htmlspecialchars($_GET["book"]);
    $user = $_SESSION["user"]["id"];
    $note = $Note->create_note($content, $book, $user);
  }

  if(isset($_GET["delete-note"]) && isset($_SESSION["user"])){
    $id = $_GET["delete-note"];
    $user = $_SESSION["user"]["id"];
    $note = $Note->get_note($user, $id);
    $Note->delete_note($user, $id);
    echo "<script>(() => {window.location.assign('notes.php?book=$note[book_id]')})()</script>";
  }
?>