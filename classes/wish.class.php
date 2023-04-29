<?php

class Wish extends Dbh
{

    protected function getAllWishes($user_id)
    {
        $sql = "SELECT * FROM wish_items WHERE user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function checkForDuplicate($user_id, $product_id)
    {
        $sql = "SELECT id FROM wish_items WHERE user_id = ? AND product_id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id, $product_id]);
        return ($stmt->rowCount() > 0) ? true : false ;
    }

    protected function createWish($session_id, $user_id, $product_id, $time_created)
    {
        $sql = "INSERT INTO wish_items (`session_id`, `user_id`, `product_id`, `time_created`) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$session_id, $user_id, $product_id, $time_created]);
        $result = $stmt->fetch();
        return $result;
    }

    protected function deleteWish($user_id, $product_id)
    {
        $sql = "DELETE FROM wish_items WHERE user_id = ? AND product_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id, $product_id]);
    }
}
