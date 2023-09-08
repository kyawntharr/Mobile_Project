<?php

use function PHPSTORM_META\type;

include_once __DIR__ . '/controller/packageController.php';
include_once __DIR__ . '/controller/paymentController.php';

$id = $_GET['id'];

$package_controller = new PackageController();
$pkg_image = $package_controller->getPackageById($id);

// if (isset($_POST['pay'])) {
//     $email = $_POST['email'];
//     $payment_method = $_POST['pay_method'];
//     $card_number = $_POST['cardnumber'];
//     $owner_name = $_POST['owner_name'];
//     $package = $id;
//     $amount = $pkg_image['amount'];

//     echo $email . '<br>' . $payment_method . '<br>';
//     echo $card_number . '<br>' . $owner_name . '<br>';
//     echo $package . '<br>' . $amount . '<br>';
// }

$payment_controller = new paymentController();
$data = $payment_controller->getalldata();
foreach ($data as $value) {
    // echo $value['email'];
    if (isset($_POST['pay'])) {
        $email = $_POST['email'];
        $payment_method = $_POST['pay_method'];
        $card_number = $_POST['cardnumber'];
        $owner_name = $_POST['owner_name'];
        $package = (int) $id;
        $amount = $pkg_image['amount'];

        if ($value['email'] === $email && $value['payment_methods'] === $payment_method && $value['card_number'] === $card_number && $value['name_on_card'] === $owner_name && $value['amount'] === $amount && $value['package_id'] === $package) {
            // echo '<script>
            // location.href = \'index.php\';
            // </script>';
            $user_id = $payment_controller->getuserid($value['email']);

            $user_id_bymail = $user_id['id'];
            $payment_id = $value['id'];

            // echo 'user is ' . $user_id_bymail;
            // echo 'payment is ' . $payment_id;
            // echo 'package is ' . $package;
            $add_to_sale = $payment_controller->inserttosale($package, $payment_id, $user_id_bymail);
            if ($add_to_sale) {
                echo '<script>location.href = \'index.php\';</script>';
            }
        } else {
            echo '<script>alert("Fail To Pay,Try Again!");</script>';
        }

        // if ($value['email'] === $email && $value['payment_methods'] === $payment_method && $value['card_number'] === $card_number && $value['name_on_card'] === $owner_name && $value['amount'] === $amount && $value['package_id'] === $package) {
        //     echo 'pass';
        // }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .form-control:focus {
            box-shadow: none;
        }

        ;
    </style>
</head>

<body>
    <div class="container py-5" style="background: #f5f5f5;">
        <div class="row">
            <div class="col-md-4 text-center py-2">
                <div class="">
                    <!-- <h3><?php echo $pkg_image['name']; ?></h3> -->
                    <h5 class="display-6 text-info"><i><?php echo $pkg_image['name']; ?> Package</i></h5>
                    <h3 class="display-6">MMK&nbsp;<?php echo $pkg_image['amount']; ?>.00</h3>
                </div>
                <div class="mt-5 text-center">
                    <img src="uploads/<?php echo $pkg_image['image']; ?>" class="img-fluid " style="height: 200px; width: 200px"
                        class="display-3">
                </div>
            </div>
            <div class="col-md-7 ">
                <div class="row mb-8">
                    <div class="col-lg-8 mx-auto text-center">
                        <h1 class="display-6 text-info"><i>Payment</i></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card border-info">
                            <div class="card-header">
                                <!-- credit card info-->
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="email">
                                            <h6><i>Contact Information</i></h6>
                                        </label>
                                        <input type="text" name="email" id="email"
                                            placeholder="example@gmail.com" required
                                            class="form-control border border-info" spellcheck="true" required>
                                    </div>
                                    <div class="form-group ">
                                        <label for="selecttype">
                                            <h6><i>Select your Payment</i></h6>
                                        </label>
                                        <select class="form-control border border-info" id="selecttype"
                                            name="pay_method" required>
                                            <option value="" class="text-secondary" selected disabled hidden>
                                                --Payment
                                                Method--</option>
                                            <option value="Wave Money">Wave Money</option>
                                            <option value="Kpay">Kpay</option>
                                            <option value="Ok Dollor">Ok Dollor</option>
                                        </select>
                                    </div>
                                    <form role="form">

                                        <div class="form-group">
                                            <label for="cardnumber">
                                                <h6><i>Card number</i></h6>
                                            </label>
                                            <div class="input-group">
                                                <input type="number" name="cardnumber" id="cardnumber"
                                                    placeholder="Card number" class="form-control border border-info"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="owner_name">
                                                <h6><i>Owner</i></h6>
                                            </label>
                                            <input type="text" name="owner_name" id="owner_name"
                                                placeholder="card owner Name" required
                                                class="form-control border border-info" spellcheck="true">
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-block btn-primary" name="pay">
                                                Confirm Payment </button>
                                    </form>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
