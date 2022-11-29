<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

// class Product extends Model
class Product extends Model implements HasMedia, Searchable

{
    use HasFactory, HasSlug, InteractsWithMedia;

    protected $guarded = ['id'];
    protected $casts = [
        'is_featured' => 'boolean',


    ];

    protected static $defaultImage = '/common/default-image/defaultCategoryImage.jpg';

    public function getSearchResult(): SearchResult
    {
        //        $url = route('site.product.show', $this->slug);

        $url = '';
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function setIsFeaturedAttribute($value)
    {
        $this->attributes['is_featured'] = $value === 'on' ? 1 : 0;
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();

        $this->addMediaCollection('gallery_image');
    }

    public function registerMediaConversions(Media $media = null): void
    {

        $this->addMediaConversion('original')
            ->fit(Manipulations::FIT_CROP, 1100, 640)
            ->performOnCollections('image');

        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 200, 200)
            ->performOnCollections('image');


        $this->addMediaConversion('original')
            ->fit(Manipulations::FIT_CROP, 1100, 640)
            ->performOnCollections('image', 'gallery_image');


        $this->addMediaConversion('square-md-thumb')
            ->fit(Manipulations::FIT_CROP, 200, 200)
            ->performOnCollections('image', 'gallery_image');

        $this->addMediaConversion('square-sm-thumb')
            ->fit(Manipulations::FIT_CROP, 170, 100)
            ->performOnCollections('image', 'gallery_image');
    }

    public function getFirstOrDefaultMediaUrl(string $collectionName = 'default', string $conversionName = ''): string
    {
        $url = $this->getFirstMediaUrl($collectionName, $conversionName);

        return $url ?: $this::$defaultImage ?? '';
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}

