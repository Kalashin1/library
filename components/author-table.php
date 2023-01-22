<?php
require("./controllers/author.php");
require("./controllers/book.php");
$authors = $Author->get_authors();
?>

<div class="row">
  <div class="col-12 col-md-8 col-lg-10">
    <div class="card" style="overflow: scroll;">
      <div class="card-header">
        <h4>Simple</h4>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Surname</th>
              <th scope="col">Books</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($authors as $author) { ?>
              <tr>
                <th scope="row"><?php echo substr($author["id"], 0, 6); ?></th>
                <td><?php echo $author["name"]; ?></td>
                <td><?php echo $author["surname"]; ?></td>
                <td><?php echo count($Book->get_book_by_author($author["id"])); ?></td>
                <td>
                  <a 
                    class="text-warning"
                    href="<?php echo "create-author.php?author=$author[id]&name=$author[name]&surname=$author[surname]&bio=$author[bio]"; ?>"
                  >
                    <span class="fas fa-edit"></span>
                  </a>
                  <a class="text-danger author" data-author="<?php echo $author["id"] ?>"><span class="author fas fa-trash"  data-author="<?php echo $author["id"] ?>"></span></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>