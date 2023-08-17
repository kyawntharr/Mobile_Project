<?php
include_once __DIR__ . '/layouts/header.php';
include_once __DIR__ . '/controller/boxDownController.php';

$id = $_GET['id'];
$box_down_controller = new boxDownController();
$show_box = $box_down_controller->showBoxdown($id);


?>


<section class="container bg-white g-0">

    <h2 class="p-head pt-5"><?php echo $show_box['name'] ?></h2>

    <div class="card-body">
        <div class="row">
            <div class="align-item-center d-flex flex-column justify-content-between p-3">
                <img src="uploads/<?php echo $show_box['image'] ?>" class="img-fluid m-5 align-self-center box_img" style=" width: 700px; height: 440px; transition: transform .5s ease;">

            </div>
        </div>
        <div class="row align-items-center h-100 fw-information my-2 p-3">
            <div class="ml-auto mr-auto">
                <div class="row d-flex px-5">
                    <p class="text-danger"><?php echo $show_box['post'] ?></p>
                </div>
            </div>
            <div class="col-lg-10 text-center col-lg-10 offset-lg-1 col-xl-6 offset-xl-3">
                <div class="pt-5 pb-3">
                    <a href="<?php echo $show_box['download_link'] ?>" type="submit" class="btn rounded-1 w-50 border-0" id="down_btn" target="_blank">Download OneDrive&nbsp;<i class="ri-download-2-fill"></i></a>
                </div>
                <div class="pb-3">
                    <a href="<?php echo $show_box['download_link'] ?>" type="submit" class="btn rounded-1 w-50 border-0" id="down_btn" target="_blank">Download
                        MediaFire&nbsp;<i class="ri-download-2-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include_once __DIR__ . '/layouts/footer.php';
?>