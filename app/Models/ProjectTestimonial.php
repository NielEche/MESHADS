<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTestimonial extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'testimonial', 'author', 'project_id', 'is_visible',
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

	// Table relationships
    public function project()
    {
        return $this->belongsTo(Project::class)->withDefault();
    }

}
