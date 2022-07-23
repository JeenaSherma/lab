<?php
require_once('config/config.php');
require_once('config/db.php');
require_once('includes/header.php');
require_once('includes/navbar.php');

$artlist = $obj->select('arts');
if(isset($_GET['action'])){
    if($_GET['action']=='add_cart'){

        $_POST['f_id']=$_GET['id'];
        $_POST['status']=1;

        
  $check=$obj->select('carts', '*', 'f_id', array($_GET['id']));

  if($check){
    echo "<script>alert('items already added');</script>";
    echo "<script>window.location.href='".base_url('index.php')."'</script>";


}
else{
    $aa=$obj->insert('carts', $_POST);
    if($aa){
        echo "<script>window.location.href='".base_url('index.php')."'</script>";

    }
    else{
        echo "error";


    }
}
    }}
?>

<style>
    .art-card {
        margin-bottom: 1 rem;
    }


    .sect-arts{
        margin-top: 2rem;
    }

    .art-container {
        display: block;
        overflow: hidden;
    }

    .art-container img {
        transition: all 600ms ease;
        width: 100% !important;
        height: 40vh;
    }

    .art-container:hover img {
        transform: scale(1.2);
    }

    .individual-art a {
        text-decoration: none;
    }
</style>

<section class="sect-arts">
    <div class="container ">
        <div class="row">
            <div class="col-sm-12 mb-3">
                <h3>Available arts</h3>
            </div>

            <?php foreach ($artlist as $key => $value) : ?>
                <div class="col-sm-4 individual-art">

                    <div class="card art-card mb-3">
                        <a class="text-decoration-none" href="<?= base_url('pages/buy.php?id=' . $value['id']) ?>">

                            <div class="card-header">
                                <div class="art-container">
                                    <img src="<?= file_url($value['image']) ?>" class="img-thumbnail" alt="">
                                </div>
                            </div>
                            <div class="card-footer text-center">   
                                <div class="row">
                                    <div class="col-6">
                                        
                                        <p class="text-info text-nowrap"><?= $value['art_name'] ?></p>

                                    </div>

                                    <div class="col-6 d-flex justify-content-end">

                                        <a href="index.php?action=add_cart&id=<?=$value['id']?>" class="btn btn-outline-warning d-inine-flex">Add to cart</a>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</section>


<?php
require_once('includes/footer.php');
?>