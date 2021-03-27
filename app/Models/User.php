<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use App\Models\Requests;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public $incrementing = false;

    protected static function boot(){
     parent::boot();
     static::creating(function ($model) {
         $model->{$model->getKeyName()} = (string) Str::uuid();
       });
     }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'first',
        'last',
        'type',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isAdmin()
    {
      return $this->type == 'admin' || $this->type == 'super admin';
    }

    public function isSuperAdmin()
    {
      return $this->type == "super admin";
    }

    public function defaultProfilePhotoUrl()
    {
      $size = 80;
      $default = "mp";
      $rating = "x";
      $url = 'https://www.gravatar.com/avatar/';
      $url .= md5(strtolower(trim($this->email)));
      $url .= "?s=$size&d=$default&r=$rating";
      return $url;
    }

    public function needsToReview()
    {
      return Requests::where('status', 'submitted')->exists();
    }

    public function requests() {
      return $this->hasMany(Requests::class);
    }
}
