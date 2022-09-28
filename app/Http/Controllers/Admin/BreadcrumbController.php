<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Services\MenuService;
use App\Http\Controllers\Controller;
use App\Http\Services\BreadcrumbService;

class BreadcrumbController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        MenuService $menuService,
        BreadcrumbService $breadcrumbService
    ) {
        $this->menuService = $menuService;
        $this->breadcrumbService = $breadcrumbService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbService->getRecords();
        $menus = $this->menuService->getVisibleRecords();
        
        return view('admin.breadcrumbs.index', compact('breadcrumbs', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->breadcrumbService->createRecord($request);
        return redirect()->back()->with('success_msg', 'Done successfully!');
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
        $this->breadcrumbService->updateRecord($id, $request);
        return redirect()->back()->with('success_msg', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->breadcrumbService->deleteRecord($id);
        return redirect()->back()->with('success_msg', 'Deleted successfully!');
    }
}
