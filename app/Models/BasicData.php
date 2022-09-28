<?php

namespace App\Models;

use App\Traits\Fileable;
use Illuminate\Database\Eloquent\Model;

class BasicData extends Model
{
    use Fileable;

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'basic_data';

	/** 
	 * Storage folder where uploaded files relating to this model will be stored
	 * 
	 * @var string
	 */
	public function storageFolder()
	{
		return 'basic-data';
	}

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'short_name', 'full_name', 'logo_name', 'logo_url', 'logo_white_name', 
		'logo_white_url', 'brochure_name', 'brochure_url',
    ];

	//Accessors
	public function getLogoAttribute()
    {
        return $this->getFile($this->logo_name);
    }

	public function getWhiteLogoAttribute()
    {
        return $this->getFile($this->logo_white_name);
    }

	public function getBrochureAttribute()
    {
        return $this->getFile($this->brochure_name);
    }
}
