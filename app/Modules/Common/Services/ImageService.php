<?php

namespace App\Modules\Common\Services;


use App\Modules\Common\Repositories\ImageRepositoryInterface;


class ImageService
{
    protected $imageRepo;

    public function __construct(ImageRepositoryInterface $imageRepo)
    {
        $this->imageRepo = $imageRepo;
    }


}
