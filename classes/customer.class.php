<?php

class Customer extends Dbh
{

    protected function createCustomer($user_id,$first_name,$last_name,$address_1,$address_2,$city,$state,$zip_code,$phone,$time_created)
    {
        $sql = "INSERT INTO customers (`user_id`,`first_name`,`last_name`,`address_1`,`address_2`,`city`,`state`,`zip_code`,`phone`,`time_created`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $db = $this->connect();
        $stmt = $db->prepare($sql);

        if(!$stmt->execute([$user_id,$first_name,$last_name,$address_1,$address_2,$city,$state,$zip_code,$phone,$time_created])) {
            $stmt = null;
            header('Location: ../shipping?error=stmtfailed');
            exit();
        }
        $stmt = null;

        return $db->lastInsertId();
    }

}