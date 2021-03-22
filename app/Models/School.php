<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    public function courses() {
        return $this->hasMany(Course::class);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->code = \Illuminate\Support\Str::snake($model->name);
        });
        static::created(function ($model) {
            auth()->user()->have_school = true;
            auth()->user()->save();
        });
    }
}
