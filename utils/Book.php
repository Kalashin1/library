<?php
class Book {

  private $connection;

  function __construct($conn){
    $this->connection = $conn;
  }

  function addBook($title, $page, $author_id, $category_id, $pub_year, $image) {
    $var = ["title" => "", "page" => "", "author" => "", "category" => "", "year_of_publication" => "", "image" => "", "id" => ""];
    $var["title"] = mysqli_real_escape_string($this->connection, $title);
    $var["page"] = mysqli_real_escape_string($this->connection, $page);
    $var["author"] = mysqli_real_escape_string($this->connection, $author_id);
    $var["category"] = mysqli_real_escape_string($this->connection, $category_id);
    $var["year_of_publication"] = mysqli_real_escape_string($this->connection, $pub_year);
    $var["image"] = mysqli_real_escape_string($this->connection, $image);
    $var["id"] = uniqid(rand(), true);
    $sql = "INSERT INTO books(`id`, `title`, `page`, `author`, `category`, `year_of_publication`, `image`) VALUES('$var[id]', '$var[title]', '$var[page]', '$var[author]', '$var[category]', '$var[year_of_publication]', '$var[image]')";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    } else {
      return $var;
    }
  }

  function get_books(){
    $sql = "SELECT books.title, books.id, books.page, authors.name, authors.surname, authors.id AS authors_id, categories.title AS category_title, categories.id AS category_id FROM books INNER JOIN authors ON books.author=authors.id INNER JOIN categories ON books.category=categories.id WHERE books.is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    $books = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $books;
  }

  function get_book($id) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $sql = "SELECT books.title, books.id, books.page, authors.name, authors.surname, authors.id AS author_id, categories.title AS category_title, categories.id AS category_id  FROM books INNER JOIN authors ON books.author=authors.id INNER JOIN categories ON books.category=categories.id WHERE books.is_deleted='0' AND books.id='$id'";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    $book = mysqli_fetch_assoc($query);
    return $book;
  }

  function get_book_by_category($category){
    $category = mysqli_real_escape_string($this->connection, $category);
    $sql = "SELECT books.title, books.id, books.page, authors.name, authors.surname, authors.id AS author_id, categories.title AS category_title, categories.id AS category_id  FROM books INNER JOIN authors ON books.author=authors.id INNER JOIN categories ON books.category=categories.id WHERE books.is_deleted='0' AND books.category='$category'";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function get_book_by_year($year){
    $year = mysqli_real_escape_string($this->connection, $year);
    $sql = "SELECT books.title, books.id, books.page, authors.name, authors.surname, authors.id AS author_id, categories.title AS category_title, categories.id AS category_id  FROM books INNER JOIN authors ON books.author=authors.id INNER JOIN categories ON books.category=categories.id WHERE books.is_deleted='0' AND books.year_of_publication='$year'";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function update_book($id, $title, $page, $pub_year, $image, $category, $author) {
    $var = ["id" => "", "title" => "", "page" => "", "year_of_publication" => "", "image" => "", "category" => "", "author" => ""];
    $var["id"] = mysqli_real_escape_string($this->connection, $this->id);
    $var["title"] = mysqli_real_escape_string($this->connection, $title);
    $var["page"] = mysqli_real_escape_string($this->connection, $page);
    $var["year_of_publication"] = mysqli_real_escape_string($this->connection, $pub_year);
    $var["image"] = mysqli_real_escape_string($this->connection, $image);
    $var["category"] = mysqli_real_escape_string($this->connection, $category);
    $var["author"] = mysqli_real_escape_string($this->connection, $author);

    $sql = "UPDATE books SET title='$var[title]', page='$var[page]', year_of_publication='$var[year_of_publication]', image='$var[image]', category='$var[category]', author='$var[author]' WHERE id ='$id'";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    return $var;
  }

  function delete_book($id) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $time_stamp = date("Y-m-d h:i:s");
    $sql = "UPDATE books, comments, notes SET books.is_deleted='1', books.deleted_at='$time_stamp', comments.is_deleted='1', comments.deleted_at='$time_stamp', notes.is_deleted='1', notes.deleted_at='$time_stamp' WHERE books.id='$id' AND books.id=comments.book AND books.id=notes.book";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)){
      echo "Opps something happened ".mysqli_error($this->connection);
    }
  }
}
