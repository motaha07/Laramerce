<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Contracts\CategoryContract;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    
    /**
     * @var CategoryContract
     */
    protected $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryContract $categoryRepository
     */
    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoryRepository->listCategories();

        $this->setPageTitle('Categories', 'List of all categories');
        return view('admin.categories.index', compact('categories'));
    }
}
