<?php
include_once __DIR__ . '/../vendor/database/database.php';

class Package
{
    public function getPackageInfo()
    {
        //1.db connection
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //2. write sql
        $sql = 'select * from packages';
        $statement = $con->prepare($sql);
        //3. sql excute
        if ($statement->execute()) {
            //4. result
            //date fetch()==>one row, fetchall()==>multiple row
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function createPackage($name, $amount, $filename, $detail)
    {
        //1.db connection
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //2. write sql
        $sql = "insert into packages(name,amount,image,details)
     values (:name,:amount,:image,:details)";
        $statement = $con->prepare($sql);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':amount', $amount);
        $statement->bindParam(':image', $filename);
        $statement->bindParam(':details', $detail);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getPackageInfoById($id)
    {
        //1.db connection
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //2. write sql
        $sql = 'select * from packages where id=:id';
        $statement = $con->prepare($sql);
        $statement->bindParam(':id', $id);
        //3. sql excute
        if ($statement->execute()) {
            //4. result
            //date fetch()==>one row, fetchall()==>multiple row
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function editPackage($id, $name, $amount, $filename, $detail)
    {
        //1.db connection
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //2. write sql
        $sql = 'update packages set name=:name,amount=:amount,image=:image,details=:details where id=:id';
        $statement = $con->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':amount', $amount);
        $statement->bindParam(':image', $filename);
        $statement->bindParam(':details', $detail);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deletePackageInfo($id)
    {
        //1.db connection
        $con = Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //2. write sql
        $sql = 'DELETE FROM packages WHERE id=:id';
        $statement = $con->prepare($sql);
        $statement->bindParam(':id', $id);

        if ($statement->execute()) {
            return true;
        }
    }
}
