<?php

namespace App\Services\Stripe;

use Stripe\StripeClient;

class PriceService {

    protected $stripe;

    public function __construct(StripeClient $stripe)
    {
        $this->stripe = $stripe;
    }

    public function get()
    {
        return $this->stripe->prices->all();
    }

    public function create(array $data)
    {
        return $this->stripe->prices->create($data);
    }

    public function update($priceId, array $data)
    {
        return $this->stripe->prices->update($priceId, $data);
    }

    public function retrieve($priceId)
    {
        return $this->stripe->prices->retrieve($priceId,[]);
    }

    public function delete($priceId)
    {
        return $this->stripe->prices->delete($priceId);
    }

    public function search(array $query)
    {
        return $this->stripe->prices->all($query);
    }
}