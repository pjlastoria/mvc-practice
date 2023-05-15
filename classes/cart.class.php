<?php

class Cart extends Dbh {

    public function getCartSession(string $user_id, string $session_id) {
        $sql = "SELECT * FROM cart_sessions WHERE user_id = ? OR session_id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id, $session_id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getCartItems(string $session_id) {
        $sql = "SELECT * FROM carts_items WHERE session_id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$session_id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function deleteItem($session_id, $product_id)
    {
        $sql = "DELETE FROM cart_items WHERE session_id = ? AND product_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$session_id, $product_id]);
    }

}