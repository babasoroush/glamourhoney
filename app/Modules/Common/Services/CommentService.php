<?php

namespace App\Modules\Common\Services;


use App\Modules\Common\Repositories\CommentRepositoryInterface;


class CommentService
{
    protected $commentRepo;

    public function __construct(CommentRepositoryInterface $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }


}
