<?php

require_once('config/config.php');
require_once('config/db.php');
require_once('includes/header.php');

if (isset($_POST['addart'])) {
    if ($_POST['addart'] == 'Add') {

        $imgName = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = 'images' . '/' . $imgName;
        move_uploaded_file($tmp_name, $location);
        $_POST['image'] = $imgName;
        // print_r($_POST);
        unset($_POST['addart']);
        $a = $obj->insert('arts', $_POST);
        if ($a) {
            echo "<script>alert('Art added successfully.');</script>";
        } else {
            echo "<script>alert('Error adding art.');</script>";
        }
    }
}

$artlist = $obj->select('arts');

if (isset($_GET['id'])) {
    if (!empty($_GET['id'])){
        $obj->Delete("arts", "id", array($_GET['id']));
        echo "<script> window.location.href='" . base_url('add-food.php') . "'</script>";
    }
}
?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h4>Add Art</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="Name">Art Name</label>
                            <input type="text" name="art_name" class="form-control" id="Name">

                        </div>
                        <div class="form-group">
                            <label for="Name">Description</label>
                            <input type="text" name="description" class="form-control" id="Name">

                        </div>
                        <div class="form-group">
                            <label for="Name">Artist Name</label>
                            <input type="text" name="artist_name" class="form-control" id="Name">

                        </div>
                        <div class="form-group">
                            <label for="Price">Price </label>
                            <input type="text" name="price" class="form-control" id="Price">
                        </div>
                        <div class="form-group">
                            <label for="Thumnail">Image </label>
                            <input type="file" name="image" class="form-control" id="Thumnail">
                        </div>
                        <div class="form-group my-3">
                            <!-- <button class="btn btn-primary" name="addfood" value="Add">Add</button> -->
                            <input type="submit" name="addart" value="Add" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
       
    </div>
</div>