<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'types';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = [
        'name',
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
