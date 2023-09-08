<?php
include_once __DIR__ . '/../model/payment.php';

class paymentController extends payment
{
    public function getalldata()
    {
        return $this->getalldataInfo();
    }

    public function getuserid($email)
    {
        return $this->getuseridInfo($email);
    }

    public function inserttosale($packages_id, $payment_id, $user_id)
    {
        return $this->inserttosaleInfo($packages_id, $payment_id, $user_id);
    }
}
