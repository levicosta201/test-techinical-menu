<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Service\Product\ProductService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $productService;

    public function __construct(
        ProductService $productService
    )
    {
        $this->productService = $productService;
    }

    public function get(Request $request)
    {
        return $this->productService->get($request);
    }

    public function save(ProductRequest $request)
    {
        return $this->productService->save($request->toArray());
    }
}
