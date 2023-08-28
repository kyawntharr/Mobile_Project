<?php
include_once __DIR__ . '/layouts/header.php';
include_once __DIR__ . '/controller/packageController.php';
include_once __DIR__ . '/controller/serviceController.php';

$package_controller = new PackageController();
$packages = $package_controller->getPackage();

$service_controller = new serviceController();
$faqs = $service_controller->getAllfaq();

?>
<style>
    .service {
        padding: 50px 0;
    }

    .service .service-list {
        /* padding: 0; */
        list-style: none;
    }

    .service .service-list li {
        border-bottom: 1px solid gray;
        margin-bottom: 20px;
        padding-bottom: 20px;
    }

    .service .service-list .question {
        display: block;
        position: relative;
        font-size: 18px;
        line-height: 15px;
        opacity: 0.8;
        padding-left: 25px;
        cursor: pointer;
        color: #000;
        transition: 0.3s;
    }

    .service .service-list i {
        position: absolute;
        left: 0;
        top: -2px;
    }

    .service .service-list p {
        margin-bottom: 0;
        padding: 10px 0 0 25px;
        color: #2eb82e;
    }

    .service .service-list .icon-show {
        display: none;
    }

    .service .service-list .collapsed {
        color: black;
    }

    .service .service-list .collapsed:hover {
        font-size: 1.2em;
        color: #000;
    }

    .service .service-list .collapsed .icon-show {
        display: inline-block;
        transition: 0.6s;
    }

    .service .service-list .collapsed .icon-close {
        display: none;
        transition: 0.6s;
    }
</style>

<section class="container-fluid bg-dark g-0 position-relative home_bg">
    <img src="assets/images/mobile_bg_3.jpg" class="img-fluid w-100" style="height: 650px" alt="">

    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(35, 61, 87, .6);">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-lg-10">
                    <h1 class="display-4 animate__animated animate__zoomInUp mmst wow" data-wow-delay="0.2s">Myanmar
                        Software Support
                        Team</h1>
                    <p class="fs-5 mb-4 pb-2  animate__animated animate__flipInX wow mmstp" data-wow-delay="1s" style="font-family: 'Zawgyi A Lan 5';">
                        Welcome From Myanmar Software Support Team.Thank for your visit!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= Service Section ======= -->
<section id="service" class="service">
    <div class="container py-5">

        <div class="section-title">
            <h2><b>Our Service</b></h2>
        </div>

        <ul class="service-list pt-4">
            <?php
            foreach ($faqs as $faq) {

            ?>
                <li>
                    <div data-bs-toggle="collapse" class="collapsed question" href="#<?php echo $faq['id']; ?>">
                        <span class="head-text"><?php echo $faq['title']; ?></span>
                        <i class="ri-add-line icon-show"></i>
                        <i class="ri-subtract-line icon-close"></i>
                    </div>
                    <div id="<?php echo $faq['id']; ?>" class="collapse">
                        <p><?php echo $faq['content']; ?></p>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>

    </div>
</section>
<!-- End Service Section -->

<!--package section start-->
<section class="container-fluid package bg-white g-0">
    <div class="row g-0 justify-content-around p-3">
        <h3 class="text-center display-4"><i><b>Packages</b></i></h3>
        <?php foreach ($packages as $package) { ?>

            <div class="card col-md-3 my-3 mx-1 rounded-1 animate__animated animate__rotateInUpLeft wow " data-wow-delay="0.7s" style="border: 1px solid #60a626;">
                <div class="card-header align-items-center d-flex flex-column justify-content-center" style="background-color: #bbe797;">
                    <p class="package_title p-2 text-center"><?php echo $package['name']; ?></p>
                    <div>
                        <img src="uploads/<?php echo $package['image']; ?>" class="img-fluid " style="height: 100px; width: 100px">
                    </div>
                </div>
                <div class="card-body bg-white">
                    <span class="price"><i class="ri-price-tag-3-line">&nbsp;&nbsp;</i>&nbsp;&nbsp;<?php echo $package['amount']; ?>ks&nbsp;/&nbsp;month</span>
                    <ul class="text-secondary">
                        <?php echo $package['details']; ?>
                        <li>And More tutorials...</li>
                    </ul>
                </div>
                <div class="card-footer border-0 justify-content-between d-flex pk_btn  bg-white">
                    <a href="#" class="btn rounded-1"><i class="ri-information-line">&nbsp;</i>Details</a>
                    <a href="https://buy.stripe.com/test_eVa4hj6vH0q6cgw148" class="btn rounded-1"><i class="ri-hand-coin-line">&nbsp;</i>Buy</a>
                </div>
            </div>
        <?php } ?>

    </div>
</section>
<hr>

<!--team section start-->
<section class="container bg-white mb-5 pt-4 pb-4">
    <div class="container g-0 p-3">
        <div class="row">
            <span class="display-3 align-items-center d-flex justify-content-around animate__animated animate__flipInX wow" data-wow-delay="0.2s">Team</span>
            <p class="p-4 animate__animated wow animate__bounceInDown " data-wow-delay="0.5s">Lorem ipsum dolor sit
                amet, consectetur adipisicing elit. Consequatur corporis dolor
                explicabo laborum
                nisi obcaecati odio optio voluptatem voluptatibus! Dolorem et ipsam sunt. Aperiam consequuntur dolores
                eos quas sed! Vero.</p>

            <div class="card col-md-3 bg-white team_area border-0  wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                <div class="rounded-1 border border-1 team">
                    <div class="team_img1 bg-white">
                        <div class="p-3 d-flex align-items-center justify-content-around flex-column team_img2">
                            <img src="assets/images/faces/face2.jpg" alt="" class="img-fluid rounded-circle" style="height: 150px; width: 150px">
                        </div>
                    </div>

                    <div class="d-flex flex-column text-center team_detail">
                        <span class="team_name">Nang Yu Yu Zin</span>
                        <span>Web Template Design</span>
                        <span>nangyu@gmail.com</span>
                        <div class="py-3 align-items-center d-flex justify-content-center team_btn">
                            <a href="#" class="btn btn-success btn-sm">Details</a>
                        </div>
                    </div>

                </div>

            </div>
            <div class="card col-md-3 bg-white team_area border-0 wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
                <div class="rounded-1 border border-1 team">
                    <div class="team_img1 bg-white">
                        <div class="p-3 d-flex align-items-center justify-content-around flex-column team_img2">
                            <img src="assets/images/faces/face1.jpg" alt="" class="img-fluid rounded-circle" style="height: 150px; width: 150px">
                        </div>
                    </div>

                    <div class="d-flex flex-column text-center team_detail">
                        <span class="team_name">Su Latt Waddy</span>
                        <span>Web Template Design</span>
                        <span>sulattwaddy@gmail.com</span>
                        <div class="py-3 align-items-center d-flex justify-content-center team_btn">
                            <a href="#" class="btn btn-success btn-sm">Details</a>
                        </div>
                    </div>

                </div>

            </div>
            <div class="card col-md-3 bg-white team_area border-0 wow animate__animated animate__fadeInUp" data-wow-delay="0.8s">
                <div class="rounded-1 border border-1 team">
                    <div class="team_img1 bg-white">
                        <div class="p-3 d-flex align-items-center justify-content-around flex-column team_img2">
                            <img src="assets/images/faces/face3.jpg" alt="" class="img-fluid rounded-circle" style="height: 150px; width: 150px">
                        </div>
                    </div>

                    <div class="d-flex flex-column text-center team_detail">
                        <span class="team_name">Aung Thet Lwin</span>
                        <span>Web Template Design</span>
                        <span>aungthetlwin@gmail.com</span>
                        <div class="py-3 align-items-center d-flex justify-content-center team_btn">
                            <a href="#" class="btn btn-success btn-sm">Details</a>
                        </div>
                    </div>

                </div>

            </div>
            <div class="card col-md-3 bg-white team_area border-0 wow animate__animated animate__fadeInUp" data-wow-delay="1s">
                <div class="rounded-1 border border-1 team">
                    <div class="team_img1 bg-white">
                        <div class="p-3 d-flex align-items-center justify-content-around flex-column team_img2">
                            <img src="assets/images/faces/face4.jpg" alt="" class="img-fluid rounded-circle" style="height: 150px; width: 150px">
                        </div>
                    </div>

                    <div class="d-flex flex-column text-center team_detail">
                        <span class="team_name">Tester</span>
                        <span>Web Template Design</span>
                        <span>test@gmail.com</span>
                        <div class="py-3 align-items-center d-flex justify-content-center team_btn">
                            <a href="#" class="btn btn-success btn-sm">Details</a>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
<?php
include_once __DIR__ . '/layouts/footer.php';
?>