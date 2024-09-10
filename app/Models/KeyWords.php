<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KeyWords extends Model
{
    use HasFactory;
    protected $table = 'key_words';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = [
        'name',
        'slug'
    ];

    public function posts() : BelongsToMany {
        return $this->belongsToMany(Post::class);
    }
}
