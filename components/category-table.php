<?php
require_once("./controllers/category.php");
require_once("./controllers/book.php");
$categories = $Category->get_categories()
?>

<div class="row">
  <div class="col-12 col-md-8 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Simple</h4>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Title</th>
              <th scope="col">Books</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($categories as $category) { ?>
              <tr>
                <th scope="row"><?php echo substr($category["id"], 0, 6); ?></th>
                <td><?php echo $category["title"]; ?></td>
                <td><?php echo count($Book->get_book_by_category($category["id"])) ?></td>
                <td>
                  <a class="text-warning" href="create-category.php?category=<?php echo $category["id"]; ?>&title=<?php echo $category["title"] ?>">
                    <span class="fas fa-edit"></span>
                  </a>
                  <a class="text-danger category" data-category="<?php echo $category["id"] ?>">
                    <span class="fas fa-trash category" data-category="<?php echo $category["id"] ?>"></span>
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
