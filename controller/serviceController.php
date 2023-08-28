<?php
include_once __DIR__ . '/../model/service.php';

class serviceController extends service
{
    public function getAllfaq()
    {
        return $this->getAllfaqInfo();
    }
    public function createfaq($title, $content)
    {
        return $this->createfaqInfo($title, $content);
    }
}

?>
