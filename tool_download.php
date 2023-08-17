<?php
include_once __DIR__ . '/layouts/header.php';
include_once __DIR__ . '/controller/toolDownController.php';
include_once __DIR__ . '/controller/toolsController.php';

$toolsController = new toolsController();
$id = $_GET['id'];
// echo $id;

$tool_Down_Controller = new toolDownController();
$tools = $tool_Down_Controller->showAllTollDown($id);

// echo $_SESSION['ntoolcat'];
?>

<link rel="stylesheet" href="assets/css/dir.css">

<section class="container bg-white g-0">
    <div class="container g-0">
        <div class="path col-12 ">
            <ul>
                <li>
                    <a href="" unlink><i class="ri-folder-2-line">&nbsp;</i>Tools</a>
                </li>
                <?php
                $did = isset($_SESSION['toolcat']) ? $_SESSION['toolcat'] : null;
                
                if ($did != null) {
                    $dir = $toolsController->showTool($did);
                    // echo $dir['name'];
                    echo '<li>
                                                                    <a href=""><i class="ri-folder-2-line">&nbsp;</i>' .
                        $dir['name'] .
                        '</a>
                                                                </li>';
                    echo '<li>
                                                                    <a href=""><i class="ri-folder-2-line">&nbsp;</i>' .
                    $tools['name'] .
                    '</a>
                                                                </li>';
                }
                session_destroy();
                
                ?>
            </ul>
        </div>
    </div>

    <h2 class="p-head pt-5"><?php echo $tools['name']; ?></h2>

    <div class="card-body">
        <div class="row">
            <div class="align-item-center d-flex flex-column justify-content-between p-3">
                <img src="uploads/<?php echo $tools['image']; ?>" class="img-fluid m-5 align-self-center box_img"
                    style=" width: 700px; height: 440px; transition: transform .5s ease;">

            </div>
        </div>

        <div class="row align-items-center h-100 fw-information my-2 p-3">
            <div class="ml-auto mr-auto">
                <div class="row d-flex px-5">
                    <p><?php echo $tools['post']; ?></p>
                </div>
            </div>

        </div>

        <div class="col-lg-10 text-center col-lg-10 offset-lg-1 col-xl-6 offset-xl-3">
            <div class="pt-3 pb-3">
                <a href="<?php echo $tools['download_link']; ?>" type="submit" class="btn rounded-1 w-50 border-0" id="down_btn"
                    target="_blank">Download OneDrive&nbsp;<i class="ri-download-2-fill"></i></a>
            </div>
            <div class="pb-5">
                <a href="<?php echo $tools['download_link']; ?>" type="submit" class="btn rounded-1 w-50 border-0" id="down_btn"
                    target="_blank">Download
                    MediaFire&nbsp;<i class="ri-download-2-fill"></i></a>
            </div>
        </div>
    </div>
</section>

<?php
include_once __DIR__ . '/layouts/footer.php';
?>
