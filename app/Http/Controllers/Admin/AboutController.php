<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Services\AboutService;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AboutService $aboutService)
    {
        $this->aboutService = $aboutService;
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$about = $this->aboutService->getRecord();
		
    	return view('admin.about.index', compact('about'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$about = $this->aboutService->getRecord();

    	return view('admin.about.create', compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutRequest $request)
    {
    	$this->aboutService->createOrUpdateRecord($request, 1);

    	return redirect()->back()->with('success_msg', 'Saved successfully!');
    }
}
