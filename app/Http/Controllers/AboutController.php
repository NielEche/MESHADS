<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\TeamService;
use App\Http\Services\PostService;
use App\Http\Services\AboutService;
use App\Http\Services\SiteService;
use App\Http\Services\ClientService;

class AboutController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        TeamService $teamService,
        PostService $postService,
        AboutService $aboutService,
        SiteService $siteService,
        ClientService $clientService
    ) {
        $this->teamService = $teamService;
        $this->postService = $postService;
        $this->aboutService = $aboutService;
        $this->siteService = $siteService;
        $this->clientService = $clientService;
    }

    /**
	 * Display the about page and fetch some record from the database.
	 *
	 * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$about = $this->aboutService->getRecord();
        $teams = $this->teamService->getVisibleRecords();
    	$clients = $this->clientService->getVisibleRecords();
    	$aboutimages = $this->siteService->getAboutImage();
        $posts = $this->postService->getLimitedPublishedRecords(3);

    	return view('about', compact('teams', 'about', 'aboutimages', 'posts', 'clients'));
    }
}
