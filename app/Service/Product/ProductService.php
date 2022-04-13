<?php

namespace App\Service\Product;

use App\Repositories\Product\ProductRepository;
use App\Service\BaseService;
use App\Service\BaseServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductService extends BaseService implements BaseServiceInterface
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(
        ProductRepository $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function get(Request $request): JsonResponse
    {
        if ($request->name) {
            return $this->jsonResponse($this->productRepository->findWhere([
                'name' => $request->name
            ]), 200);
        }

        return $this->jsonResponse($this->productRepository->all(), 200);
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(array $data): JsonResponse
    {
        return $this->jsonResponse($this->productRepository->create($data), 200);
    }
}
