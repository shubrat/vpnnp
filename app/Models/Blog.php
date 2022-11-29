<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\BlogCategory;

class Blog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'source',
        'source_url',
        'content',
        'tags',
        'status',
        'is_featured',
    ];


    // default Images
    protected static $defaultImage = '/common/default-image/blog.jpg';
    protected $casts = [
        'status' => 'boolean',
        'tags' => 'collection',
    ];


    public function blogCategory(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
    }



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
            ->fit(Manipulations::FIT_CROP, 1080, 1080)
            ->performOnCollections('image');

        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 770, 450)
            ->performOnCollections('image');

        $this->addMediaConversion('thumb-sm')
            ->fit(Manipulations::FIT_CROP, 370, 205)
            ->performOnCollections('image');
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
