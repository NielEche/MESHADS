<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ProfileService;
use App\Http\Requests\ChangePasswordRequest;

class ProfileController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.profile.edit');
    }

	/**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ChangePasswordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $changed = $this->profileService->changePassword($request);

		if (! $changed) {
			return redirect()->back()->with([ 'error_msg' => 'Old password is wrong!' ]);
		}

        return redirect()->back()->with('success_msg', 'Updated successfully!');
    }
}
