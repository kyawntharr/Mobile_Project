<?php
include_once __DIR__ . '/../model/sale.php';

class saleController extends sale
{
    public function getSaleUser($id)
    {
        return $this->getuserInfo($id);
    }
    public function getallsaleuser()
    {
        return $this->getallsaleuserInfo();
    }
}
?>
