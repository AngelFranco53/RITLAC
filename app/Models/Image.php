<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = [
        'alt',
        'url',
        'imageable_id',
        'imageable_type',
    ];

    public function imageable() : MorphTo {
        return $this->morphTo();
    }
}
