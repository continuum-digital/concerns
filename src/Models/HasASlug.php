<?php

namespace Concerns\Models;

use App\Model;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Builder;

trait HasASlug
{
    use HasSlug;

    /** @return string */
    protected $slugSource = 'title';

    /** @return string */
    protected $slugName = 'slug';

    /** @return int */
    protected $slugLength = 250;

    /** @return string */
    protected function slugSource() : string
    {
        return $this->slugSource;
    }

    /** @return int */
    protected function slugLength() : int
    {
        return $this->slugLength;
    }

    /**
     * @return bool
     */
    protected function generateSlugOnUpdate() : bool
    {
        return true;
    }

    /**
     * Get the options for generating the slug.
     *
     * @return \Spatie\Sluggable\SlugOptions
     */
    public function getSlugOptions() : SlugOptions
    {
        return tap(SlugOptions::create(), function ($options) {
            $options->generateSlugsFrom($this->slugSource());
            $options->slugsShouldBeNoLongerThan($this->slugLength());
            $options->saveSlugsTo($this->slugName);

            if (!$this->generateSlugOnUpdate()) {
                $options->doNotGenerateSlugsOnUpdate();
            }
        });
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Scope by slug.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string                                $slug
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSlug($query, $slug): Builder
    {
        return $query->where('slug', $slug);
    }
}
