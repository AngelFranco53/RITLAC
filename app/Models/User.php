<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = 'users';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = [
        'username',
        'name',
        'first_last_name',
        'second_last_name',
        'personal_email',
        'email',
        'password',
        'carreer_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'profile_photo_url',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function reviwer() : HasMany {
        return $this->hasMany(Post::class);
    }

    public function publisher() : HasMany {
        return $this->hasMany(Post::class);
    }

    public function carreer() : BelongsTo {
        return $this->belongsTo(Carreer::class);
    }

    public function posts() : BelongsToMany {
        return $this->belongsToMany(Post::class);
    }
}
