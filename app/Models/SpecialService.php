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


class SpecialService extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;

    protected $fillable =['title','slug','description','status'];
    protected static $defaultImage = '/common/default-image/specialService.png';

    
    protected $hidden = ['status'];
    
    protected $casts = ['status' =>'boolean'];
    
    
    public function getSlugOptions() : SlugOptions
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


        $this->addMediaConversion('thumb-sm')
            ->fit(Manipulations::FIT_CROP, 50, 50)
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
    