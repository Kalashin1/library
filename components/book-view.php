<?php
require_once("./controllers/book.php");
require_once("./controllers/comment.php");
$book;
$comments;
if (isset($_GET["book"])) {
  $book = $Book->get_book(htmlspecialchars($_GET["book"]));
}
if (isset($_SESSION["user"])  && ($_SESSION["user"]["type"] == "ADMIN")) {
  // print_r($_SESSION["user"]);
  $comments = $Comment->get_comments($_GET["book"]);
} else {
  $comments = $Comment->get_approved_comments($_GET["book"]);
}

?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="chocolat-parent">
        <a href="<?php echo $book["image"] ?>" class="chocolat-image overflow-hidden" title="Just an example">
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
          <div class="col-6 my-4 ">
            <a href="notes.php?book=<?php echo $book["id"]; ?>" class="btn btn-primary text-white">View Notes</a>
          </div>
        </div>
        <?php if (isset($_SESSION["user"])) { ?>
          <div class="my-4">
            <h5 class="my-4">Add Comment</h5>
            <form method="POST">
              <div class="form-group">
                <textarea name="content" class="form-control w-50" rows="5"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="add-comment">Add comment</button>
              </div>
            </form>
          </div>
        <?php } ?>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-12 col-sm-12 col-lg-10">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h4>Comments</h4>
                <?php if (isset($_SESSION["user"])  && ($_SESSION["user"]["type"] == "ADMIN")) { ?>
                  <a href="book-view.php?book=<?php echo "$book[id]&approve_all=true" ?>" class="btn btn-success text-white">Approve All Pending Comment</a>
                <?php } ?>
              </div>
              <div class="card-body">
                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                  <?php if (isset($comments) > 0) { ?>
                    <?php foreach ($comments as $comment) { ?>
                      <li class="media">
                        <h4 class="mr-4"><?php echo $comment["user_name"][0]; ?></h4>
                        <div class="media-body">
                          <div class="media-right">
                            <div class="text-primary"><?php echo $comment["is_approved"] ? "Approved" : "Unapproved" ?></div>
                          </div>
                          <div class="media-title mb-1"><?php echo "$comment[user_name] $comment[user_surname]"; ?></div>
                          <div class="text-time"><?php echo date('Y-m-d', strtotime($comment["created_at"])); ?></div>
                          <div class="media-description text-muted"><?php echo $comment["content"]; ?></div>
                          <div class="media-links">
                            <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["id"] === $comment["user_id"]) { ?>
                              <div class="bullet"></div>
                              <a data-comment="<?php echo $comment["id"] ?>" class="text-danger fas fa-trash comment"></a>
                            <?php } ?>
                            <?php if (isset($_SESSION["user"])  && ($_SESSION["user"]["type"] == "ADMIN")) { ?>
                              <div class="bullet"></div>
                              <a href="book-view.php?approve_comment=<?php echo $comment["id"] ?>" class="text-success">Approve</a>
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