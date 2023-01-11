<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryAddRequest;
use App\Repositories\CategoryRepository;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        try {
            $categories = $this->categoryRepository->getAll();
        
            return view('admin.categories.index', compact('categories'));
        } catch (Exception $e) {
            abort(500);
        }
    }

    public function store(CategoryAddRequest $request)
    {
        try {
            $detail = [
                'name' => $request->input('name'),
            ];

            $this->categoryRepository->create($detail);

            return redirect()->back()->with('succes', 'Berhasil menambah data kategori');
        } catch (Exception $e) {
            return $this->serverError();
        }
    }
}
