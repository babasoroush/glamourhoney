<?php

namespace App\Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=['body' ,'user_id' ,'status'  , 'commentable_type' , 'commentable_id'];

    protected $table='comments';

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
