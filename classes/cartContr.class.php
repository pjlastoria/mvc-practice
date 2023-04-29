<?php

class CartContr extends Cart
{

    private $session_id;
    private $user_id;
    private $status;
    private $time_created;

    public function __construct(
        string $session_id,
        string $user_id,
        string $status,
        string $time_created
    ) {
        $this->session_id = $session_id;
        $this->user_id = $user_id;
        $this->status = $status;
        $this->time_created = $time_created;
    }

    public function create()
    {
        $sql = "INSERT INTO cart_sessions (`session_id`, `user_id`, `status`, `time_created`) VALUES (?, ?, ?, ?)";
        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute([
            $this->session_id, $this->user_id, $this->status, $this->time_created
        ]);

        return $db->lastInsertId();
    }
    
}