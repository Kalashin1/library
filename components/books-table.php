<?php
require("./controllers/book.php");
require("./controllers/category.php");
$books = $Book->get_books();
if (isset($_GET["filter_book_by"])) {
  $category = $_GET["filter_book_by"];
  $books = $Book->get_book_by_category(htmlspecialchars($category));
}
?>

<div class="row">
  <div class="dropdown m-4">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
      Filter By category
    </button>
    <div class="dropdown-menu">
      <?php foreach ($Category->get_categories() as $category) { ?>
        <a class="dropdown-item" href="book.php?filter_book_by=<?php echo $category["id"] ?>"><?php echo $category["title"] ?></a>
      <?php } ?>
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
                  <a href="<?php echo "create-book.php?book=$book[id]&category=$book[category_id]&category_title=$book[category_title]&author=$book[author_id]&author_name=$book[author_name]&author_surname=$book[author_surname]&year_of_publication=$book[year_of_publication]&title=$book[title]&page=$book[page]&image=$book[image]" ?>" >
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