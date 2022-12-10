<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryAddRequest;
use App\Repositories\CategoryRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends BaseController
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        try {
            $categories = $this->categoryRepository->getAll();
            $result = [
                'categories' => $categories,
            ];

            return $this->responseSuccess($result, 'success');
        } catch (Exception $e) {
            return $this->serverError();
        }
    }

    public function store(CategoryAddRequest $request)
    {
        try {
            $detail = [
                'name' => $request->input('name'),
            ];

            $this->categoryRepository->create($detail);

            return $this->responseSuccessWhitoutData('Category Created', Response::HTTP_CREATED);

        } catch (Exception $e) {
            return $this->serverError();
        }
    }
}
