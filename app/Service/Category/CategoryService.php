<?php

namespace App\Service\Category;

use App\Repositories\Category\CategoryRepository;
use App\Service\BaseService;
use App\Service\BaseServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryService extends BaseService implements BaseServiceInterface
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository
    ) {
      $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function get(Request $request): JsonResponse
    {
        if ($request->name) {
            return $this->jsonResponse($this->categoryRepository->findWhere([
                'name' => $request->name
            ]), 200);
        }

        return $this->jsonResponse($this->categoryRepository->all(), 200);
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(array $data): JsonResponse
    {
        return $this->jsonResponse($this->categoryRepository->create($data), 200);
    }
}
