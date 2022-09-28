<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesProvided extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'services_provided';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'project_id', 'is_visible',
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

	public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
    }

	//Accessors
    public function getVisibilityAttribute()
    {
        return ($this->is_visible) ? 'Visible' : 'Not visible';
    }

	// Table relationships
    public function project()
    {
        return $this->belongsTo(Project::class)->withDefault();
    }
}
