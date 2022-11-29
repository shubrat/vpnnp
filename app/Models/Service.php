<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;
    protected $fillable = ['title', 'slug', 'description', 'sdescription', 'status', 'feature'];
    protected static $defaultImage = '/common/default-image/logistic.png';


    protected $hidden = ['status', 'feature'];

    protected $casts = [
        'status' => 'boolean', 
        'feature' => 'boolean'
    ];



    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }


    public function registerMediaConversions(Media $media = NULL): void
    {
        $this->addMediaConversion('original')
            ->fit(Manipulations::FIT_CROP, 900, 660)
            ->performOnCollections('image');

        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 360, 264)
            ->performOnCollections('image');

        $this->addMediaConversion('thumb-sm')
            ->fit(Manipulations::FIT_CROP, 100, 100)
            ->performOnCollections('image');
    }


    public function scopeLast($query)
    {
        return $query->orderBy('id', 'desc')->first();
    }


    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    public function getFirstOrDefaultMediaUrl(string $collectionName = 'default', string $conversionName = ''): string
    {
        $url = $this->getFirstMediaUrl($collectionName, $conversionName);
        return $url ?: $this::$defaultImage ?? '';
    }
}
