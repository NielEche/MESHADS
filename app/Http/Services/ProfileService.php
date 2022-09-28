<?php 

namespace App\Http\Services;

use App\User as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
	/**
     * Create a new class instance.
     *
     * @return void
     */
	public function __construct(Model $model) 
	{
		$this->model = $model;
	}

	/** 
 	 * Create or update record in storage
 	 *
 	 * @param  \Illuminate\Http\Request  $request
 	 * @param  int  $id
	 * @return mixed 
	 */
	public function changePassword($request)
	{
		$user = auth()->user();
		
		if (! Hash::check($request->old_password, $user->password)) {
			return false;
        }
		
		return $user->update([
			'password' => bcrypt($request->new_password),
		]);
	}

}