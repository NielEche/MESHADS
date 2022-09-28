<?php

namespace App\Models;

use App\Traits\Fileable;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	use Fileable;

	/** 
	 * Storage folder where uploaded files relating to this model will be stored
	 * 
	 * @var string
	 */
	public function storageFolder()
	{
		return 'teams';
	}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'job_title', 'bio', 'is_visible', 'image_url', 'image_name', 
        'facebook', 'twitter', 'instagram', 'linkedin', 'github', 'pintrest',
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

    //Accessors
    public function getVisibilityAttribute()
    {
        return ($this->is_visible) ? 'Visible' : 'Not visible';
    }

	public function getAvatarAttribute()
    {
        return $this->getFile($this->image_name);
    }

}
