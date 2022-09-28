<?php

namespace App\Models;

use App\Traits\Fileable;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
	use Fileable;

        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shop';

	/** 
	 * Storage folder where uploaded files relating to this model will be stored
	 * 
	 * @var string
	 */
	public function storageFolder()
	{
		return 'shop';
	}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'url', 'primary_img_name', 'sale', 'price', 'is_visible',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_visible' => 'boolean',
        'sale' => 'boolean',
    ];

    // Mutators
    public function setIsVisibleAttribute($value)
    {
        $this->attributes['is_visible'] = boolval($value);
    }

    public function setSaleAttribute($value)
    {
        $this->attributes['sale'] = boolval($value);
    }

    //Accessors
    public function getVisibilityAttribute()
    {
        return ($this->is_visible) ? 'Visible' : 'Not visible';
        return ($this->sale) ? 'sale' : 'No Sale';
    }

    public function getFileAttribute()
    {
		return $this->getFile($this->primary_img_name);
    }

}
