<?php

class CartItemContr extends CartContr
{

    private $session_id;
    private $product_id;
    private $qty;
    private $time_created;

    public function __construct(
        string $session_id,
        string $product_id,
        int $qty,
        string $time_created
    ) {
        $this->session_id   = $session_id;
        $this->product_id   = $product_id;
        $this->qty          = $qty;
        $this->time_created = $time_created;
    }

    public function saveItem()
    {
        $sql = "INSERT INTO cart_items (`session_id`, `product_id`, `qty`, `time_created`) VALUES (?, ?, ?, ?)";
        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute([
            $this->session_id, $this->product_id, $this->qty, $this->time_created
        ]);

        return $db->lastInsertId();
    }

    public function updateQty($session_id, $item_id, $qty)
    {
        $sql = "UPDATE cart_items SET `qty` = ? WHERE `session_id` = ? AND `product_id` = ?;";
        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute([
            $qty, $session_id, $item_id
        ]);
    }

    public function getProduct()
    {
        $product = new Product();
        return $product->getProduct($this->product_id);
    }

    public function removeItem()
    {
        return $this->deleteItem($this->session_id, $this->product_id);
    }
}