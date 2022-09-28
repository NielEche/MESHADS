<?php

namespace App\Models;

use App\Traits\Fileable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Fileable;

	/** 
	 * Storage folder where uploaded files relating to this model will be stored
	 * 
	 * @var string
	 */
	public function storageFolder()
	{
		return 'projects';
	}

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'caption', 'slug', 'category_id', 'is_visible', 
		'cover_image_name', 'cover_image_url', 'alt_cover_image_name', 
		'alt_cover_image_url', 'client_name', 'quote', 'quote_author', 
		'project_brief', 'project_video_url',
    ];

	/**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_visible' => 'boolean',
    ];

	// Mutators
    public function setIsVisibleAttribute($value)
    {
        $this->attributes['is_visible'] = boolval($value);
    }

	//public function setSlugAttribute($value)
    //{
     //   $this->attributes['slug'] = str_slug($value);
   // }

	//Accessors
    public function getVisibilityAttribute()
    {
        return ($this->is_visible) ? 'Visible' : 'Not visible';
    }

    public function getCoverImageAttribute()
    {
		return $this->getFile($this->cover_image_name);
    }

	public function getAltCoverImageAttribute()
    {
		return $this->getFile($this->alt_cover_image_name);
    }

	// Table relationships
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

	public function servicesProvided()
    {
        return $this->hasMany(ServicesProvided::class);
    }

	public function projectTestimonials()
    {
        return $this->hasMany(ProjectTestimonial::class);
    }

	public function projectImages()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
