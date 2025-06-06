<?php

namespace App\Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;
    protected $fillable=['CategoryType', 'name'];

    protected $table = 'categories';

    // public function post()
    // {
    //     return $this->hasMany(Post::Class);
    // }

    // public function product()
    // {
    //     return $this->hasMany(Product::class);

    // }
}
