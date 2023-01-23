<?php
require("./controllers/book.php");
require("./controllers/category.php");
require("./controllers/author.php");
$books = $Book->get_books();
if (isset($_GET["filter_book_by"])) {
  $category = $_GET["filter_book_by"];
  $books = $Book->get_book_by_category(htmlspecialchars($category));
} else if (isset($_GET["filter_by_author"])) {
  $author = htmlspecialchars($_GET["filter_by_author"]);
  $books = $Book->get_book_by_author($author);
} else if (isset($_GET["filter_by_year"])) {
  $year = htmlspecialchars($_GET["filter_by_year"]);
  $books = $Book->get_book_by_year($year);
} else if (isset($_GET["search_book"])) {
  $term = htmlspecialchars($_GET["search_book"]);
  $books = $Book->search_book($term);
}
?>

<div class="row">
  <div class="d-flex align-items-center">
    <!-- // * FILER BY CATEGORY-->
    <div class="dropdown m-4">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Filter By category
      </button>
      <div class="dropdown-menu">
        <?php foreach ($Category->get_categories() as $category) { ?>
          <a class="dropdown-item" href="?filter_book_by=<?php echo $category["id"] ?>"><?php echo "$category[title] (" . count($Book->get_book_by_category($category["id"])) . ")" ?></a>
        <?php } ?>
      </div>
    </div>
    <!-- //* FILTER BY AUTHOR -->
    <div class="dropdown m-4">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Filter By Author
      </button>
      <div class="dropdown-menu">
        <?php foreach ($Author->get_authors() as $author) { ?>
          <a class="dropdown-item" href="?filter_by_author=<?php echo $author["id"] ?>"><?php echo "$author[name] $author[surname]" ?></a>
        <?php } ?>
      </div>
    </div>
    <!-- //* FILTER BY YEAR -->
    <div class="dropdown m-4">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Filter By Year
      </button>
      <div class="dropdown-menu">
        <?php foreach ($Book->get_books() as $book) { ?>
          <a class="dropdown-item" href="?filter_by_year=<?php echo $book["year_of_publication"] ?>"><?php echo "$book[year_of_publication]" ?></a>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-10 col-lg-10">
    <div class="card" style="overflow-x: scroll;">
      <div class="card-header">
        <h4>Book Table</h4>
      </div>
      <div class="card-body">
        <table class="table" style="overflow-x: scroll;">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Title</th>
              <th scope="col">Author</th>
              <th scope="col">Page</th>
              <th scope="col">Category</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($books as $book) { ?>
              <tr>
                <th scope="row"><?php echo substr($book["id"], 0, 6); ?></th>
                <td><?php echo $book["title"] ?></td>
                <td><?php echo $book["author_name"] . " " . $book["author_surname"]; ?></td>
                <td><?php echo $book["page"] ?></td>
                <td><?php echo $book["category_title"] ?></td>
                <td>
                  <a href="<?php echo "create-book.php?book=$book[id]&category=$book[category_id]&category_title=$book[category_title]&author=$book[author_id]&author_name=$book[author_name]&author_surname=$book[author_surname]&year_of_publication=$book[year_of_publication]&title=$book[title]&page=$book[page]&image=$book[image]" ?>">
                    <span class="fas fa-edit text-warning"></span>
                  </a>
                  <a class="text-danger book">
                    <span class="fas fa-trash book" data-book="<?php echo $book["id"]; ?>"></span>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>