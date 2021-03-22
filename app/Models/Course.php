<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'published',
        'published_at',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->code = \Illuminate\Support\Str::kebab($model->name);
            $model->published = false;
        });
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
