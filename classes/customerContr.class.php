<?php

class CustomerContr extends Customer
{

    private $user_id;
    private $first_name;
    private $last_name;
    private $address_1;
    private $address_2;
    private $city;
    private $state;
    private $zip_code;
    private $phone;
    private $time_created;

    public function __construct(
        int $user_id = null,
        string $first_name,
        string $last_name,
        string $address_1,
               $address_2 = null,
        string $city,
        string $state,
        int $zip_code,
               $phone = null,
        string $time_created
    ) {
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->address_1 = $address_1;
        $this->address_2 = $address_2;
        $this->city = $city;
        $this->state = $state;
        $this->zip_code = $zip_code;
        $this->phone = $phone;
        $this->time_created = $time_created;
    }

    public function saveCustomer()
    {
        if($this->emptyInput() == false) {
            header('Location: ../shipping?error=emptyinput');
            exit();
        }

        return $this->createCustomer(
            $this->user_id,
            $this->first_name,
            $this->last_name,
            $this->address_1,
            $this->address_2,
            $this->city,
            $this->state,
            $this->zip_code,
            $this->phone,
            $this->time_created
        );
    }

    private function emptyInput() {
        $result = true;
        if( empty($this->first_name) || empty($this->last_name) || empty($this->address_1) || 
            empty($this->city)       || empty($this->state)     || empty($this->zip_code)  || empty($this->phone)) {
            $result = false;
        }

        return $result;
    }
}
