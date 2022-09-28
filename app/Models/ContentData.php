<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentData extends Model
{

    	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'content_data';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'social_tag', 'slug', 'is_enabled',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_enabled' => 'boolean',
    ];

    // Mutators
    public function setIsEnabledAttribute($value)
    {
        $this->attributes['is_enabled'] = boolval($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['url'] = ucfirst($value);
    }

    //Accessors
    public function getStatusAttribute()
    {
        return ($this->is_enabled) ? 'Enabled' : 'Disabled';
    }

}
