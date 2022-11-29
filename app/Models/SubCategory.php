<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class SubCategory extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['title', 'category_id', 'status'];

    protected $hidden = ['status'];
    protected $casts = ['status' => 'boolean'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function show()
    {
        return $this->hasMany(Show::class , 'sub_category_id');
    }
}
