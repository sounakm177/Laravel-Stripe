<?php

namespace App\Services\Stripe;

use Stripe\StripeClient;

class ProductService {

    protected $stripe;

    public function __construct(StripeClient $stripe)
    {
        $this->stripe = $stripe;
    }

    public function get(array $query)
    {
        return $this->stripe->products->all($query);
    }

    public function create(array $data)
    {
        return $this->stripe->products->create($data);
    }

    public function update($productId, array $data)
    {
        return $this->stripe->products->update($productId, $data);
    }

    public function retrieve($productId)
    {
        return $this->stripe->products->retrieve($productId);
    }

    public function delete($productId)
    {
        return $this->stripe->products->delete($productId);
    }

    public function search(array $query)
    {
        return $this->stripe->products->all($query);
    }
}