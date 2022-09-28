<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'url', 'is_slave', 'is_visible', 'master_id', 
        'ext', 'position',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'ext' => 'boolean',
        'is_slave' => 'boolean',
        'is_visible' => 'boolean',
    ];

    // Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
    }

    public function setExtAttribute($value)
    {
        $this->attributes['ext'] = boolval($value);
    }

    public function setIsVisibleAttribute($value)
    {
        $this->attributes['is_visible'] = boolval($value);
    }

    public function setIsSlaveAttribute($value)
    {
        $this->attributes['is_slave'] = boolval($value);
    }
}
