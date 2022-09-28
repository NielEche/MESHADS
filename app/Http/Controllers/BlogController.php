<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PostService;
use App\Http\Services\SiteService;
use App\Http\Controllers\Controller;



class BlogController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PostService $postService,
        SiteService $siteService
    ) {

        $this->postService = $postService;
        $this->siteService = $siteService;
    }

    /**
	 * Display the about page and fetch some record from the database.
	 *
	 * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$contacts = $this->contactService->getRecord();
    	$aboutimages = $this->siteService->getblogImage();

    	return view('contact', compact('contacts', 'aboutimages' ));
    }
}
