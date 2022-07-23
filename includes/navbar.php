<?php
if (isset($_GET['action'])) {
  if ($_GET['action'] == 'remove_cart') {

    $aa = $obj->Delete('carts', 'id', array($_GET['id']));
    echo "<script> window.location.href='" . base_url('index.php') . "'</script>";
  }
}

if (isset($_POST['submit'])) {
  if ($_POST['submit'] == 'delete_all') {
    print_r($_POST);


    $aa = $obj->Query("DELETE from carts");
    echo "<script> window.location.href='" . base_url('index.php') . "'</script>";
  }
}
?>


<style>
  .avatar img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="avatar ml-2">
    <img src="<?= base_url('images/mandala.jpg') ?>" alt="Logo">
  </div>
  <a class="navbar-brand font-weight-bold text-primary ml-2" href="<?= base_url('index.php') ?>">Arts</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

    </ul>

    <div class="d-flex justify-content-end mr-5">



      <ul class="list-unstyled d-inline-flex mt-2">


        <?php

        $no_of_cart_items_query = $obj->Query("SELECT count(id) as no_of_carts from carts");

        $no_of_carts = $no_of_cart_items_query[0]->no_of_carts;
        ?>

        <li>


          <button class="btn btn-light" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <h5 class="d-inline ml-2 text-"> My carts<i class="bx bx-cart"></i><sup><?= $no_of_carts ?></sup></h5>

          </button>


        </li>
        
      </ul>
    </div>

  </div>

</nav>