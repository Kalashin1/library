<?php
  session_start();
  require_once("./components/header.php");

?>
<div class="loader"></div>
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <?php require_once("./components/navbar.php"); ?>
    <?php require_once("./components/sidebar.php"); ?>
    <div class="main-content">
      <section class="section">
      <section class="section mb-4">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Books</a></li>
                <li class="breadcrumb-item active" aria-current="page">Books Table</li>
              </ol>
            </nav>
          </div>
        </div>
      </section>
        <?php require_once("./components/books-table.php"); ?>
      </section>
    </div>
  </div>
</div>
<?php require_once("./components/footer.php"); ?>