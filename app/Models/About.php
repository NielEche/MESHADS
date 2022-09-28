<?php

namespace App\Models;

use App\Traits\Fileable;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
	use Fileable;

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'about';

	/** 
	 * Storage folder where uploaded files relating to this model will be stored
	 * 
	 * @var string
	 */
	public function storageFolder()
	{
		return 'about-page';
	}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brief', 'primary_img_name', 'primary_img_url', 'secondary_img_name', 
		'secondary_img_url', 'quote', 'quote_author',
    ];

	//Accessors
	public function getPrimaryImageAttribute()
    {
        return $this->getFile($this->primary_img_name);
    }

	public function getSecondaryImageAttribute()
    {
        return $this->getFile($this->secondary_img_name);
    }
}
