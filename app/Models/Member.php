<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Member extends Model implements HasMedia
{
    use HasFactory,HasSlug, InteractsWithMedia;

    protected $fillable  = [
        'name',
        'designation',
        'about',
        'facebook',
        'instagram',
        'twitter',
    ];

      // default Images
      protected static $defaultImage = '/common/default-image/member.png';


      protected $hidden = [
          'status',
      ];
  
      protected $casts = [
          'status' => 'boolean',
      ];
  
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
            ->fit(Manipulations::FIT_CROP, 1080, 1080)
            ->performOnCollections('image');

        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 270, 270)
            ->performOnCollections('image');

        $this->addMediaConversion('thumb-sm')
            ->fit(Manipulations::FIT_CROP, 100, 100)
            ->performOnCollections('image');
    }
    
    public function getFirstOrDefaultMediaUrl(string $collectionName = 'default', string $conversionName = ''): string
    {
        $url = $this->getFirstMediaUrl($collectionName, $conversionName);
        return $url ?: $this::$defaultImage ?? '';
    }


}
