<?php

class WishContr extends Wish
{

    private $session_id;
    private $user_id;
    private $product_id;
    private $time_created;

    public function __construct(
        string $session_id,
        int    $user_id,
        int    $product_id,
        string $time_created
    ) {
        $this->session_id = $session_id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->time_created = $time_created;
    }

    public function fetchList() {
        return $this->getAllWishes($this->user_id);
    }

    public function exists() {
        return $this->checkForDuplicate($this->user_id, $this->product_id);
    }

    public function addItem() {
        return $this->createWish($this->session_id, $this->user_id, $this->product_id, $this->time_created);
    }

    public function removeItem() {
        $this->deleteWish($this->user_id, $this->product_id);
    }

    public function getProduct()
    {
        $product = new Product();
        return $product->getProduct($this->product_id);
    }

    public function getUserWishList()
    {
        $product = new Product();
        return $product->getWishlistProducts($this->user_id);
    }

}