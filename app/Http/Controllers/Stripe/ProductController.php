<?php

namespace App\Http\Controllers\Stripe;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Stripe\StripeClient;
use App\Services\Stripe\ProductService;
use App\Services\Stripe\PriceService;

class ProductController extends Controller
{
    protected $productServiceStripe;
    protected $priceServiceStripe;

    public function __construct(ProductService $productServiceStripe, PriceService $priceServiceStripe)
    {
        $this->productServiceStripe = $productServiceStripe;
        $this->priceServiceStripe = $priceServiceStripe;
    }

    public function list(Request $request)
    {
        $product = $this->productServiceStripe->get(['limit' => 3]);
        if(count($product->data) > 0){
            $product = collect($product->data)->map(function($product){
                $product->price = $this->priceServiceStripe->retrieve($product->default_price);
                return $product;
            });
        }
        
        return Inertia::render('Stripe/List', [
            'auth' => Auth::user(),
            'products' => $product
        ]);
    }
}