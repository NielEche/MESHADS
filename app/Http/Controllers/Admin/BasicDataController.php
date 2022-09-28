<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasicDataRequest;
use App\Http\Services\BasicDataService;

class BasicDataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BasicDataService $basicDataService)
    {
        $this->basicDataService = $basicDataService;
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data = $this->basicDataService->getRecord();

    	return view('admin.basic-data.create', compact('data'));
    }

	/**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BasicDataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BasicDataRequest $request)
    {
    	$this->basicDataService->createOrUpdateRecord($request, 1);

    	return redirect()->back()->with('success_msg', 'Saved successfully!');
    }
}
