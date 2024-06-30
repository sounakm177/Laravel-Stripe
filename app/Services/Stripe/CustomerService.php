<?php

namespace App\Services\Stripe;

use Stripe\StripeClient;

class CustomerService {

    protected $stripe;

    public function __construct(StripeClient $stripe)
    {
        $this->stripe = $stripe;
    }

    public function get()
    {
        return $this->stripe->customers->all();
    }

    public function create(array $data)
    {
        return $this->stripe->customers->create($data);
    }

    public function update($customerId, array $data)
    {
        return $this->stripe->customers->update($customerId, $data);
    }

    public function retrieve($customerId)
    {
        return $this->stripe->customers->retrieve($customerId);
    }

    public function delete($customerId)
    {
        return $this->stripe->customers->delete($customerId,[]);
    }

    public function search(array $query)
    {
        return $this->stripe->customers->search($query);
    }
}
