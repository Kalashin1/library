<?php
require('./controllers/category.php');
require('./controllers/author.php');
require('./controllers/book.php');
require('./controllers/user.php');

?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div>
    <h4>Create An Author</h4>
    <form method="post" action="" enctype="application/x-www-form-urlencoded">
      <!-- <input required name="name" placeholder="John" /> <br /> -->
      <!-- <input required name="surname" placeholder="Doe" /> <br /> -->
      <input required name="username" placeholder="kala" /> <br />
      <input required name="password" type="password" placeholder="***" /> <br />
      <!-- <h5>Select Category</h5> -->
      <!-- <select required name="category">
        <?php
          foreach ($Category->get_categories() as $category) {
        ?>
          <option name="category" value="<?php echo $category["id"] ?>">
            <?php echo $category["title"] ?>
          </option>
        <?php
          }
        ?>
      </select> <br />
      <h5>Select Author</h5>
      <select required name="author">
        <?php
          foreach ($Author->get_authors() as $author) {
        ?>
          <option name="author" value="<?php echo $author["id"] ?>">
            <?php echo $author["name"]." ".$author["surname"] ?>
          </option>
        <?php
          }
        ?>
      </select> <br /> -->
      <!-- <input name="year_of_publication" type="date" required /><br /> -->
      <button name="login-user">Submit</button>
    </form>
  </div>

</body>

</html>