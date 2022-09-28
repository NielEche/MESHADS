<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ShopService;
use App\Http\Services\SiteService;
use App\Http\Controllers\Controller;



class ShopController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        ShopService $shopService,
        SiteService $siteService
    ) {

        $this->shopService = $shopService;
        $this->siteService = $siteService;
    }

    /**
	 * Display the about page and fetch some record from the database.
	 *
	 * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$shops = $this->shopService->getVisibleRecords();
    	$aboutimages = $this->siteService->getshopImage();

    	return view('shop', compact('shops', 'aboutimages' ));
    }
}
