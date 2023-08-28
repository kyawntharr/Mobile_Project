<?php
include_once __DIR__ . '/../vendor/database/database.php';

class service{
    public function getAllfaqInfo(){
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * FROM faq';
        $state = $con->prepare($sql);
        if($state->execute()){
            $result = $state->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function createfaqInfo($title,$content)
    {
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO faq(title,content) VALUES (:title,:content)';
        $state = $con->prepare($sql);
        $state->bindParam(':title', $title);
        $state->bindParam(':content', $content);
        if ($state->execute()) {
            return true;
        }else{
            return false;
        }
    }
}
?>