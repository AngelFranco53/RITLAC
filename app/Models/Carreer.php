<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carreer extends Model
{
    use HasFactory;
    protected $table = 'careers';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = [
        'name', 
        'description',
        'abbreviates',
        'slug'
    ];

    public function users() : HasMany {
        return $this->hasMany(User::class);
    }

    public function posts() : HasMany {
        return $this->hasMany(Post::class);
    }
}
