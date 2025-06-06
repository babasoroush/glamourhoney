<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Modules\User\Providers\UserServiceProvider::class,
    App\Modules\Auth\Providers\AuthServiceProvider::class,
    App\Modules\AdminManager\Providers\AdminManagerServiceProvider::class,
    App\Modules\Common\Providers\CommonServiceProvider::class,
    App\Modules\Blog\Providers\BlogServiceProvider::class,
];
