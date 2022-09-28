<?php

namespace App;

use App\Traits\Fileable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, Fileable;

	/** 
	 * Storage folder where uploaded files relating to this model will be stored
	 * 
	 * @var string
	 */
	public function storageFolder()
	{
		return 'users';
	}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image_name', 'image_url', 'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
		'is_active' => 'boolean',
    ];
	
	// Mutators
    public function setIsActiveAttribute($value)
    {
        $this->attributes['is_active'] = boolval($value);
    }

	//Accessors
    public function getStatusAttribute()
    {
        return ($this->is_active) ? 'Active' : 'Deactivated';
    }

    public function getAvatarAttribute()
    {
		return $this->getFile($this->image_name);
    }
}
