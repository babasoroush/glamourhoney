<?php

namespace App\Modules\Common\Services;


use App\Modules\Common\Repositories\CategoryRepositoryInterface;


class CategoryService
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }


}
