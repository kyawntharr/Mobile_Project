<?php
include_once __DIR__ . '/../vendor/database/database.php';
class sale
{
    public function getuserInfo($id) //this for getSaleUser
    {
        $connect = database::connect();
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * FROM sale WHERE user_id = :id';
        $state = $connect->prepare($sql);
        $state->bindParam(':id', $id);

        if ($state->execute()) {
            $result = $state->fetch(PDO::FETCH_ASSOC);
        }

        return $result;
    }
    public function getallsaleuserInfo()
    {
        $connect = database::connect();
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT
    packages.name as pk_name,
    users.name as user_name,
    users.email as user_mail,
    users.image as user_profile,
    DATE_FORMAT(sale.date, '%d-%m-%Y') as date
FROM sale
JOIN packages ON packages.id = sale.packages_id
JOIN users ON users.id = sale.user_id;
"; // Use :id as a placeholder
        $state = $connect->prepare($sql);

        if ($state->execute()) {
            $result = $state->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function getuserbyuserInfo($id)
    {
        $connect = database::connect();
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * FROM sale WHERE user_id=:id';
        $state = $connect->prepare($sql);
        $state->bindParam(':id', $id);

        if ($state->execute()) {
            $result = $state->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    }
}
