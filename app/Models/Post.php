<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = [
        'name',
        'slug',
        'abstract',
        'summary',
        'extract',
        'body',
        'status',
        'file',
        'reviwer_id',
        'publisher_id',
        'category_id',
        'carreer_id',
    ];

    public function reviwer() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function publisher() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function carreer() : BelongsTo {
        return $this->belongsTo(Carreer::class);
    }

    public function tags() : BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }

    public function keywords() : BelongsToMany {
        return $this->belongsToMany(KeyWords::class);
    }

    public function authors() : BelongsToMany {
        return $this->belongsToMany(User::class);
    }

    public function image() : MorphOne {
        return $this->morphOne(Image::class, 'imageable');
    }
}
