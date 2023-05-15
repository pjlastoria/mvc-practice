<?php

class Order extends Dbh {

    protected function createOrder($user_id, $session_id, $total, $time_created, $stripe_sesh_id)
    {
        $sql = "INSERT INTO orders (`user_id`, `session_id`, `total`, `time_created`, `stripe_checkout_session_id`) VALUES (?, ?, ?, ?, ?)";
        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute([
            intval($user_id), $session_id, floatval($total), $time_created, $stripe_sesh_id
        ]);
        
        return $db->lastInsertId();
    }

}