<?php

namespace App\Models;

use App\Traits\Fileable;
use Illuminate\Database\Eloquent\Model;

class Breadcrumb extends Model
{
    use Fileable;

	/** 
	 * Storage folder where uploaded files relating to this model will be stored
	 * 
	 * @var string
	 */
	public function storageFolder()
	{
		return 'breadcrumbs';
	}

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'menu_slug', 'image_name', 'image_url',
    ];

    // Mutators
  //  public function setSlugAttribute($value)
    //{
     //   $this->attributes['slug'] = str_slug($value);
  //  }

    //Accessors
    public function getImageAttribute()
    {
		return $this->getFile($this->image_name);
    }
}
