<?php

namespace App\Modules\AdminManager\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\User\Models\User;
class Role extends Model
{
    // use HasFactory;
    protected $table = 'roles';

    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
