<?php
include_once __DIR__ . '/../model/package.php';

class PackageController extends Package
{
    public function getPackage()
    {
        return $this->getPackageInfo();
    }
    public function addPackage($name, $amount, $filename, $detail)
    {
        return $this->createPackage($name, $amount, $filename, $detail);
    }
    public function getPackageById($id)
    {
        return $this->getPackageInfoById($id);
    }
    public function updatePackage($id, $name, $amount, $filename, $detail)
    {
        return $this->editPackage($id, $name, $amount, $filename, $detail);
    }
    public function deletePackage($id)
    {
        return $this->deletePackageInfo($id);
    }
}
