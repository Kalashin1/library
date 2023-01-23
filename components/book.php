<?php
require("./controllers/book.php");
$books = $Book->get_books();
if (isset($_GET["filter_book_by"])){
  $category = $_GET["filter_book_by"];
  $books = $Book->get_book_by_category($category);
}
foreach ($books as $book) { ?>
  <div class="col-12 col-sm-6 col-lg-6">
    <div class="card">
      <div class="chocolate-parent">
        <a href="<?php echo "book-view.php?book=$book[id]" ?>" class="chocolate-image overflow-hidden" title="Just an example">
          <div data-crop-image="285">
            <img alt="image" src="<?php echo $book["image"]; ?>" class="img-fluid">
          </div>
        </a>
      </div>
      <div class="card-body">
        <div class="row d-flex justify-content-between align-items-center">
          <div class="col-6">
            <h6><?php echo $book["title"] ?></h6>
          </div>
          <div class="col-6">
            <p><?php echo "By: $book[author_name] $book[author_surname]" ?></p>
          </div>
          <div class="col-6">
            <h6><?php echo "Published: $book[year_of_publication]" ?></h6>
          </div>
          <div class="col-6">
            <p><?php echo "Pages: $book[page]" ?></p>
          </div>
        </div>

      </div>
    </div>
  </div>
<?php } ?>