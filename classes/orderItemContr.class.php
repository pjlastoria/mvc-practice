<?php

class OrderItemContr extends OrderContr
{

    private $stripe_price_id;
    private $order_id;
    private $stripe_line_item_id;
    private $time_created;

    public function __construct(
        string $stripe_price_id,
        int    $order_id,
        string $stripe_line_item_id,
        string $time_created
    ) {
        $this->stripe_price_id     = $stripe_price_id;
        $this->order_id            = $order_id;
        $this->stripe_line_item_id = $stripe_line_item_id;
        $this->time_created        = $time_created;
    }

    public function saveItem()
    {
        $sql = "INSERT INTO order_items (`stripe_price_id`, `order_id`, `stripe_line_item_id`, `time_created`) 
                VALUES (?, ?, ?, ?)";
        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute([
            $this->stripe_price_id, $this->order_id, $this->stripe_line_item_id, $this->time_created
        ]);

    }

}