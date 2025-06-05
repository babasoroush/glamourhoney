<?php

namespace App\Modules\Media\Services;


use App\Modules\Media\Repositories\ImageRepositoryInterface;


class ImageService
{
    protected $imageRepo;

    public function __construct(ImageRepositoryInterface $imageRepo)
    {
        $this->imageRepo = $imageRepo;
    }


}
