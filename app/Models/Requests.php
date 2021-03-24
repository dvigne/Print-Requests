<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Requests extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected static function boot(){
     parent::boot();
     static::creating(function ($model) {
         $model->{$model->getKeyName()} = (string) Str::uuid();
       });
     }

    protected $fillable = [
      "id",
      'user_id',
      "filename",
      "status"
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
