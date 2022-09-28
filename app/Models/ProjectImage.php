<?php

namespace App\Models;

use App\Traits\Fileable;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use Fileable;

	/** 
	 * Storage folder where uploaded files relating to this model will be stored
	 * 
	 * @var string
	 */
	public function storageFolder()
	{
		return 'project-images';
	}

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_name', 'image_url', 'project_id', 'is_visible', 'tag',
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

    public function getProjectImageAttribute()
    {
		return $this->getFile($this->image_name);
    }

	// Table relationships
    public function project()
    {
        return $this->belongsTo(Project::class)->withDefault();
    }
}
