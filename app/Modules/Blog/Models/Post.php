<?php

namespace App\Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\Common\Models\Category;
use App\Modules\Common\Models\Image;
use App\Modules\Common\Database\Factories\ImageFactory;
use App\Modules\Common\Models\Comment;
use App\Modules\User\Models\User;


class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'posts';

    protected $fillable=[
        'title' ,
        'body' ,
        'status',
        'category_id',
        'user_id',
        'slug'
    ];

    public function category() {

        return $this->BelongsTo(Category::Class);
    }
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
    public function authors(){
        return $this->BelongsTo(User::class,'user_id');
    }
}
