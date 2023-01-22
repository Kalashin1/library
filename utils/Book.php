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
    $var["book_author_id"] = uniqid(rand(), true);
    $var["book_category_id"] = uniqid(rand(), true);
    $sql = "INSERT INTO books(id, title, page, year_of_publication, image) VALUES('$var[id]', '$var[title]', '$var[page]', '$var[year_of_publication]', '$var[image]');";
    $sql2 = "INSERT INTO books_author (`id`, `book`, `author`) VALUES('$var[book_author_id]', '$var[id]', '$var[author]');";
    $sql3 = "INSERT INTO book_category(`id`, `book`, `category`) VALUES('$var[book_category_id]', '$var[id]', '$var[category]');";
    mysqli_query($this->connection, $sql);
    mysqli_query($this->connection, $sql2);
    mysqli_query($this->connection, $sql3);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    } else {
      return $var;
    }
  }

  function get_books(){
    $sql = "SELECT books.title, books.id, books.page, books.image, books.year_of_publication, books_author.id AS author_id, authors.name AS author_name, authors.surname AS author_surname, book_category.id AS category_id, categories.title AS category_title FROM books INNER JOIN books_author ON books.id=books_author.book INNER JOIN authors ON authors.id=books_author.author INNER JOIN book_category ON book_category.book=books.id INNER JOIN categories ON book_category.category=categories.id WHERE books.is_deleted='0' AND categories.is_deleted='0' AND authors.is_deleted='0';";
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
    $sql = "SELECT books.title, books.id, books.page, books.image,  books.year_of_publication, books_author.id AS author_id, authors.name AS author_name, authors.surname AS author_surname, book_category.id AS category_id, categories.title AS category_title FROM books INNER JOIN books_author ON books.id=books_author.book INNER JOIN authors ON authors.id=books_author.author INNER JOIN book_category ON book_category.book=books.id INNER JOIN categories ON book_category.category=categories.id WHERE books.is_deleted='0' AND books.id='$id'";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    $book = mysqli_fetch_assoc($query);
    return $book;
  }

  function get_book_by_category($category){
    $category = mysqli_real_escape_string($this->connection, $category);
    $sql = "SELECT book_category.id, categories.title AS category_title, books.title AS book_title FROM book_category INNER JOIN categories ON book_category.category=categories.id INNER JOIN books ON books.id=book_category.book WHERE book_category.category='$category' AND categories.is_deleted='0' AND books.is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function get_book_by_year($year){
    $year = mysqli_real_escape_string($this->connection, $year);
    $sql = "SELECT books.title, books.id, books.page, books.image,  books.year_of_publication, books_author.id AS author_id, authors.name AS author_name, authors.surname AS author_surname, book_category.id AS category_id, categories.title AS category_title FROM books INNER JOIN books_author ON books.id=books_author.book INNER JOIN authors ON authors.id=books_author.author INNER JOIN book_category ON book_category.book=books.id INNER JOIN categories ON book_category.category=categories.id WHERE books.is_deleted='0'; AND books.year_of_publication='$year'";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function get_book_by_author($author){
    $author = mysqli_real_escape_string($this->connection, $author);
    $sql = "SELECT books_author.id, books_author.book, books.title FROM books_author INNER JOIN books ON books_author.book=books.id WHERE author='$author' AND books.is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
  }

  function update_book($id, $title, $page, $pub_year, $image) {
    $var = ["id" => "", "title" => "", "page" => "", "year_of_publication" => "", "image" => "", "category" => "", "author" => ""];
    $var["id"] = mysqli_real_escape_string($this->connection, $this->id);
    $var["title"] = mysqli_real_escape_string($this->connection, $title);
    $var["page"] = mysqli_real_escape_string($this->connection, $page);
    $var["year_of_publication"] = mysqli_real_escape_string($this->connection, $pub_year);
    $var["image"] = mysqli_real_escape_string($this->connection, $image);

    $sql = "UPDATE books SET title='$var[title]', page='$var[page]', year_of_publication='$var[year_of_publication]', image='$var[image]' WHERE id ='$id' AND is_deleted='0'";
    $query = mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)) {
      echo "error something happened ".mysqli_error($this->connection);
    }
    return $var;
  }

  function delete_book($id) {
    $id = mysqli_real_escape_string($this->connection, $id);
    $time_stamp = date("Y-m-d h:i:s");
    $sql = "UPDATE books SET books.is_deleted='1', books.deleted_at='$time_stamp' WHERE books.id='$id'";
    mysqli_query($this->connection, $sql);
    if (mysqli_error($this->connection)){
      echo "Opps something happened ".mysqli_error($this->connection);
    }
  }
}
