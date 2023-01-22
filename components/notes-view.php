<?php
require_once("./controllers/book.php");
require_once("./controllers/notes.php");

$book;
$notes = [];
if (isset($_GET["book"])) {
  $book = $Book->get_book(htmlspecialchars($_GET["book"]));
}
if (isset($_SESSION["user"]) && $_GET["book"]) {
  $notes = $Note->get_book_notes($_SESSION["user"]["id"], $_GET["book"]);
} else {
  echo "<script>(() => {window.location.assign('login.php')})()</script>";
}

?>

<div class="row">
  <div class="col-12">
    <div class="card">
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
        <?php if (isset($_SESSION["user"])) { ?>
          <div class="my-4">
            <form method="POST">
              <div class="form-group">
                <textarea name="content" class="form-control w-50" rows="5"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="add-note">Add Note</button>
              </div>
            </form>
          </div>
        <?php } ?>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-12 col-sm-12 col-lg-10">
            <div class="card">
              <div class="card-header">
                <h4>Notes</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                  <?php if (isset($notes) > 0) { ?>
                    <?php foreach ($notes as $note) { ?>
                      <li class="media">
                        <div class="media-body">
                          <div class="text-time"><?php echo date('Y-m-d', strtotime($note["created_at"])); ?></div>
                          <div class="media-description text-muted"><?php echo $note["content"]; ?></div>
                          <div class="media-links">
                            <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["id"] === $note["user_id"]) { ?>
                              <div class="bullet"></div>
                              <a data-note="<?php echo $note["id"] ?>" class="text-danger fas fa-trash note"></a>
                            <?php } ?>
                          </div>
                        </div>
                      </li>
                    <?php } ?>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>