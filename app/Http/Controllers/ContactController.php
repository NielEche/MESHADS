<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ContactService;
use App\Http\Services\SiteService;
use App\Http\Controllers\Controller;



class ContactController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        ContactService $contactService,
        SiteService $siteService
    ) {

        $this->contactService = $contactService;
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
    	$aboutimages = $this->siteService->getContactImage();

    	return view('contact', compact('contacts', 'aboutimages' ));
    }
}
