<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
      "filename",
      "stats"
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
