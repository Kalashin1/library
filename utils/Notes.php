<?php
class Note {

  private $connection;

  function __construct($conn)
  {
    $this->connection = $conn;
  }

  function create_note($content, $book, $user) {
    $content = mysqli_escape_string($this->connection, $content);
    $book = mysqli_escape_string($this->connection, $book);
    $user = mysqli_escape_string($this->connection, $user);
    $id = uniqid(rand(), true);
    $sql = "INSERT INTO notes(id, content, book, user) VALUES('$id', '$content', '$book', '$user')";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    return ["id" => $id, "content" => $content, "book_id" => $book, "user_id" => $user];
  }

  function get_note($user, $note_id) {
    $user = mysqli_escape_string($this->connection, $user);
    $note_id = mysqli_escape_string($this->connection, $note_id);
    $sql = "SELECT notes.content, notes.id, notes.created_at, books.title, books.page, books.id AS book_id, users.id AS user_id, users.name AS user_name, users.surname AS user_surname FROM notes INNER JOIN books ON notes.book=books.id INNER JOIN users ON notes.user=users.id WHERE notes.is_deleted='0' AND notes.user='$user' AND notes.id='$note_id'";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    $result = mysqli_fetch_assoc($query);
    return $result;
  }

  function get_user_notes($user, $book) {
    $user = mysqli_escape_string($this->connection, $user);
    $book = mysqli_escape_string($this->connection, $book);
    $sql = "SELECT notes.content, books.title, books.page, books.id AS book_id, users.id AS user_id, users.name AS user_name, users.surname AS user_surname FROM notes INNER JOIN books ON notes.book=books.id INNER JOIN users ON notes.user=users.id WHERE notes.is_deleted='0' AND notes.user='$user' AND notes.book='$book' AND books.is_deleted='0' AND users.is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function get_book_notes($user, $book) {
    $user = mysqli_escape_string($this->connection, $user);
    $book = mysqli_escape_string($this->connection, $book);
    $sql = "SELECT notes.content, notes.id, notes.created_at, books.title, books.page, books.id AS book_id, users.id AS user_id, users.name AS user_name, users.surname AS user_surname FROM notes INNER JOIN books ON notes.book=books.id INNER JOIN users ON notes.user=users.id WHERE notes.is_deleted='0' AND notes.user='$user' AND notes.book='$book' AND books.is_deleted='0' AND users.is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function delete_note($user, $note_id) {
    $user = mysqli_escape_string($this->connection, $user);
    $note_id = mysqli_escape_string($this->connection, $note_id);
    $time_stamp = date("Y-m-d h:i:s");
    $sql = "UPDATE notes set is_deleted='1', deleted_at='$time_stamp' WHERE id='$note_id' AND user='$user'";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
  }
}
?>