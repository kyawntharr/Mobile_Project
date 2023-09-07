<?php
session_start();
include_once __DIR__ . '/vendor/database/database.php';

if (isset($_POST['search']) && !empty($_POST['search'])) {

    $name = htmlspecialchars($_POST['search']);

    $connect = database::connect();
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $pkid = isset($_POST['pkid']) ? intval($_POST['pkid']) : 0;

        $sql = "SELECT * FROM `tutorials` WHERE title LIKE :name";

        if (isset($_SESSION['acc_id'])) {
            $sql .= " AND (package_id = :pkid OR package_id IS NULL)";
        } else {
            $sql .= " AND package_id IS NULL";
        }

        $state = $connect->prepare($sql);
        $state->bindValue(':name', "$name%", PDO::PARAM_STR);

        if (isset($_SESSION['acc_id'])) {
            $state->bindValue(':pkid', $pkid, PDO::PARAM_INT);
        }

        if ($state->execute()) {
            $result = $state->fetchAll(PDO::FETCH_ASSOC);
            if (!$result) {
                echo '<p class="text-center">No Result...</p>';
            }
        }
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }

    if (isset($result)) {
        foreach ($result as $item) {
            // echo $item['title'];
            ?>

<div class="card-body row mb-2 main_card">
    <div class="col-lg-5 d-flex flex-column align-items-center p-2">
        <div class="position-relative">
            <video id="myVideo2" src="uploads/videos/<?php echo $item['video_url']; ?>" class="shadow rounded-1" width="100%"
                height="100%" controls></video>
            <span class="position-absolute top-0 start-0 text-center px-2 text-white"
                style="letter-spacing: 2px;background-color: #00b300;">Free</span>
        </div>
    </div>

    <div class="col-lg-7 p-4">
        <h4 class="col-10 d-block"><?php echo $item['title']; ?></h4>
        <?php echo $item['description']; ?>

        <a href="https://matix.li/1a47ca03e5e1" class="btn btn-sm rounded-1 justify-content-between mt-3"
            id="down_btn">Download Video&nbsp;&nbsp;<i class="ri-download-2-fill"></i></a>
    </div>
</div>
<?php
        }
    }
}
?>
