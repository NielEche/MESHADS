<?php

namespace App\Models;

use App\Traits\Fileable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use Fileable;

	/** 
	 * Storage folder where uploaded files relating to this model will be stored
	 * 
	 * @var string
	 */
	public function storageFolder()
	{
		return 'posts';
	}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'caption', 'top_content', 'bottom_content', 'middle_content', 'video_url', 'slug', 'is_published', 'quote', 'quote_author', 
        'image_url', 'image_name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_published' => 'boolean',
    ];

    // Mutators
    public function setIsPublishedAttribute($value)
    {
        $this->attributes['is_published'] = boolval($value);
    }

    //public function setSlugAttribute($value)
    //{
      //  $this->attributes['slug'] = str_slug($value);
    //}

    //Accessors
    public function getStatusAttribute()
    {
        return ($this->is_published) ? 'Published' : 'Not Published';
    }

    public function getShortContentAttribute()
    {
        return str_limit(strip_tags($this->top_content), 150, '');
    }

	public function getCoverImageAttribute()
    {
		return $this->getFile($this->image_name);
    }

}
