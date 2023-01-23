<?php ?>

<footer class="main-footer">
  <div class="footer-left">
  </div>
  <div class="footer-right">
  </div>
</footer>
</div>
</div>
<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/index.js"></script>
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- JS Libraies -->
<script src="assets/bundles/prism/prism.js"></script>
<script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
<script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/bundles/sweetalert/sweetalert.min.js"></script>
<script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>

<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>

<script>
  $("a.category").click(function(e) {
    const category = e.target.dataset["category"];
    swal({
        title: 'Are you sure?',
        text: 'Once deleted, you will not be able to recover this category!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal('Poof! category deleted!', {
            icon: 'success',
          }).then((res) => window.location.assign(`category.php?delete_category=${category}`));
        } else {
          swal('Aborted!');
        }
      });
  });
  $("a.book").click(function(e) {
    const book = e.target.dataset["book"];
    swal({
        title: 'Are you sure?',
        text: 'Once deleted, you will not be able to recover this book!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal('Poof! book deleted!', {
            icon: 'success',
          }).then((res) => window.location.assign(`book.php?delete_book=${book}`));
        } else {
          swal('Aborted!');
        }
      });
  });
  $("a.author").click(function(e) {
    const author = e.target.dataset["author"];
    swal({
        title: 'Are you sure?',
        text: 'Once deleted, you will not be able to recover this author!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal('Poof! author deleted!', {
            icon: 'success',
          }).then((res) => window.location.assign(`author.php?delete_author=${author}`));
        } else {
          swal('Aborted!');
        }
      });
  });
  $("a.comment").click(function(e) {
    const comment = e.target.dataset["comment"];
    swal({
        title: 'Are you sure?',
        text: 'Once deleted, you will not be able to recover this comment!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal('Poof! comment deleted!', {
            icon: 'success',
          }).then((res) => window.location.assign(`book-view.php?delete_comment=${comment}`));
        } else {
          swal('Aborted!');
        }
      });
  });
  $("a.note").click(function(e) {
    const note = e.target.dataset["note"];
    swal({
        title: 'Are you sure?',
        text: 'Once deleted, you will not be able to recover this note!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal('Poof! note deleted!', {
            icon: 'success',
          }).then((res) => window.location.assign(`notes.php?delete-note=${note}`));
        } else {
          swal('Aborted!');
        }
      });
  });
  setTimeout(() => {
    $.get("http://api.quotable.io/random", function(data, status) {
      console.log(data);
      $(".modal-body").text(data.content);
      $(".jokes-author").text(data.author);
      $('[data-toggle=modal]').trigger('click');
      $("[data-dismiss=modal]").click(() => {
        console.log('clickeD')
        // console.log($('.modal'))
        $(".modal.fade.show").css({display: 'none'})
        $(".modal-backdrop").css({ display: 'none'})
      })
    });
  }, 3000)
</script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>