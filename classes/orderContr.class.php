<?php

class OrderContr extends Order
{

    private $user_id;
    private $sesh_id;
    private $total;
    private $time_created;
    private $stripe_sesh_id;

    public function __construct(
               $user_id,
        string $sesh_id,
               $total,
        string $time_created,
        string $stripe_sesh_id
    ) {
        $this->user_id =        $user_id;
        $this->sesh_id =        $sesh_id;
        $this->total =          $total;
        $this->time_created =   $time_created;
        $this->stripe_sesh_id = $stripe_sesh_id;
    }

    public function addOrder()
    {
        return $this->createOrder($this->user_id, $this->sesh_id, $this->total, $this->time_created, $this->stripe_sesh_id);
    }
}
