<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ContentDataService;
use App\Http\Requests\ContentDataRequest;

class ContentDataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ContentDataService $contentdataService)
    {
        $this->contentdataService = $contentdataService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contentdatas = $this->contentdataService->getRecords();
        $tags = $this->tags();
        return view('admin.contentdata.index', compact('contentdatas', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contentdata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ContentDataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentDataRequest $request)
    {
        $this->contentdataService->createRecord($request->all());
        return redirect()->back()->with('success_msg', 'Done successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contentdata = $this->contentdataService->getOneRecord($id);
        return view('admin.contentdata.edit', compact('contentdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->contentdataService->updateRecord($id, $request->all());
        return redirect()->route('admin.contentdata.index')->with('success_msg', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->contentdataService->deleteRecord($id);
        return redirect()->back()->with('success_msg', 'Deleted successfully!');
    }

	/** 
	 * Tags 
	 * 
	 * @return array
	 */
	public function tags()
	{
		return [
			'facebook' => 'Facebook',
            'instagram' => 'Instagram',
			'twitter' => 'Twitter',
			'pinterest' => 'Pinterest',
			'behance' => 'Behance',
			'dribble' => 'Dribble',
			'youtube' => 'Youtube',
		];
	}

}
