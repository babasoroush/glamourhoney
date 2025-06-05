<?php

namespace App\Modules\Media\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\User\Models\User;


class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'path',
        'imageable_type',
        'imageable_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
