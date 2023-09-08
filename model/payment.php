<?php
include_once __DIR__ . '/../vendor/database/database.php';

class payment
{
    public function getalldataInfo()
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * FROM payment';
        $statement = $con->prepare($sql);
        if ($statement->execute()) {
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function getuseridInfo($email)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT id FROM users WHERE email = :email';
        $statement = $con->prepare($sql);
        $statement->bindParam(':email', $email);
        if ($statement->execute()) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function inserttosaleInfo($packages_id,$payment_id,$user_id)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO sale(packages_id,payment_id,user_id) VALUES (:packages_id,:payment_id,:user_id)';
        $statement = $con->prepare($sql);
        $statement->bindParam(':packages_id', $packages_id);
        $statement->bindParam(':payment_id', $payment_id);
        $statement->bindParam(':user_id', $user_id);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
